<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
