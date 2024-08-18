<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'product_id', 'quntaity', 'order_id'];
    public function order(){
        return $this->belongsTo(order::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
