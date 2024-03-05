<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = str($model->title)->slug();
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function setTitleAttribute($value)
    // {
    //     $this->attributes['title'] = $value;
    //     $this->attributes['slug'] = str($value)->slug();
    // }

    /* Relations */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

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
