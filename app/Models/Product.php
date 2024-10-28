<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'amount'
        ];
    
    public function order() 
    {
        return $this->hasOne(Order::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class,'product_category','product_id','category_id');
    }
}
