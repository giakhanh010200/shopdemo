<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalToken extends Model
{
    use HasFactory;
    protected $table = 'personal_token';
    public $fillable = [
        'token',
        'email',
        'user_id'
    ];
    public $timestamps = false;
}
