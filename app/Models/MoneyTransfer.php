<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyTransfer extends Model
{
    use HasFactory;

    protected $guarded = [];

    /* Relations */

    public function origin_account()
    {
        return $this->belongsTo(Account::class, 'origin_account_id');
    }

    public function destination_account()
    {
        return $this->belongsTo(Account::class, 'destination_account_id');
    }

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }


}
