<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'address',
        'city',
        'phone',
        'customer_id'
    ];
    public function orderDetails() {
        return $this->hasMany(Orderdetails::class);
    }
    public function products()
{
    return $this->hasMany(Product::class);
}
}
