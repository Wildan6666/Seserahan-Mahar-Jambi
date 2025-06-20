<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id','user_id', 'product_id', 'quantity', 'price','status'];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}



}
