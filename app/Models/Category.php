<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

     protected $guarded = [];

    public function setTitleAttribute($value)
    {   
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str($value)->slug();
    }

    /* Relations */

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }



}
