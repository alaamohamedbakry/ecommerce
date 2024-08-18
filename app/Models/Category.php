<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'catergories';
    public function products(){

     return $this->hasMany(Product::class,'catergories_id');
    }

}
