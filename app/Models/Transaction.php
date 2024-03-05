<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = number_format((float)$value, 2, '.', '');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('description', 'like', '%' . $search . '%')
                    ->orWhere('amount', 'like', '%' . $search . '%')
                    ->orwhereHas('subcategory', fn ($query) => $query->where('title', 'like', '%' . $search . '%'))
                    ->orWhereHas('subcategory.category', fn ($query) => $query->where('title', 'like', '%' . $search . '%'));
            });
        });


        $query->when($filters['type'] ?? null, function ($query, $trType) {
            $query->whereHas('transaction_type', fn ($query) => $query->where('title', $trType));
        });


        $query->when($filters['category'] ?? null, function ($query, $category) {
            $query->whereHas('subcategory', fn ($query) => $query->where('title', $category))
                ->orWhereHas('subcategory.category', fn ($query) => $query->where('title', $category));
        });

        $query->when($filters['sorting'] ?? false, function ($query, $sorting){
            switch ($sorting){
                case 'amountAsc':
                    $query->orderBy('amount', 'asc');
                    break;
                case 'amountDesc':
                    $query->orderBy('amount', 'desc');
                    break;
                case 'dateAsc':
                    $query->orderBy('date', 'asc');
                    break;
                case 'dateDesc':
                    $query->orderBy('date', 'desc');
                    break;
            }
        });

    }
    /* Relations */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function transaction_type()
    {
        return $this->belongsTo(TransactionType::class);
    }

    public static function current_month_transactions()
    {   
        $month = now()->month;
        $year = now()->year;
        $start = Carbon::create($year, $month, 10);
        $end = $start->copy()->addMonth();

        $accountIds = Auth::user()->accounts->pluck('id');

        return Transaction::whereIn('account_id', $accountIds)->whereBetween('date', [$start, $end])->with('subcategory.category')->with('account')->with('transaction_type')->get();
    }
}
