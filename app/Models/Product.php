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
        'description',
        'image',
        'quntaity',
        'catergories_id'
    ];

    public function orders(){
        return $this->belongsTo(order::class);
     }
     public function category(){
        return $this->belongsTo(Category::class,'catergories_id');
     }
     public function productphoto(){
        return $this->hasMany(ProductPhoto::class);
     }
}
