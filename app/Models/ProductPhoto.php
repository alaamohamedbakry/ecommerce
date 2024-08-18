<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class ProductPhoto extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public Function product(){
        return $this->belongsTo(Product::class);
    }

}
