<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpectedTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    /* Relations */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }
}
