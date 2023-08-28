<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $table = 'carts';
    public $fillable = [
        'id',
        'code',
        'user_id',
        'product_id',
        'quantity',
        'user_name',
        'user_phone',
        'user_address',
        'total_price',
        'payment_at',
        'voucher_id',
        'status',
        'payment_methods',
        'product_name',
        'product_price'

    ];
    public $timestamps = false;
}
