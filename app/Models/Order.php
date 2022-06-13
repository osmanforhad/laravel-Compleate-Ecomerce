<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'firstAddress',
        'secondAddress',
        'city',
        'pincode',
        'status',
        'message',
        'tracking_no',
        'total_price',
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

}
