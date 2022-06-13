<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'product_qty',
        'price',
    ];

    //Relationship with product table__//
    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
