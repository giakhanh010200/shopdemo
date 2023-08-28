<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    public $fillable = [
        'id',
        'user_id',
        'product_id',
        'rating',
        'content'
    ];
    public $timestamps = false;
}
