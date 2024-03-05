<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        
        'created_at',
        'updated_at',
    ];
    /* Relations */

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function expected_transactions()
    {
        return $this->hasMany(ExpectedTransaction::class);
    }

    public function recurring_transactions()
    {
        return $this->hasMany(RecurringTransaction::class);
    }
}
