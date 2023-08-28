<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $fillable = [
        'id',
        'name',
        'avatar',
        'email',
        'phone_number',
        'address',
        'created_at',
        'level',
        'point',
        'password'

    ];
    public $timestamps = false;
}
