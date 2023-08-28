<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    public $fillable = [
        'id',
        'title',
        'thumbnail',
        'content',
        'category_id',
        'created_at',
        'updated_at',
        'admin_id',
    ];
    public $timestamps = false;
}
