<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    public $fillable = [
        'id',
        'name',
        'code',
        'user_id',
        'status',
        'created_at',
        'expired_date',
        'quantity'
    ];
    public $timestamps = false;
}
