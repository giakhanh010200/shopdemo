<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrdCategory extends Model
{
    use HasFactory;
    protected $table = 'prd_category';
    public $fillable = [
        'id',
        'name'
    ];
    public $timestamps = false;
    public function getAllData(){
        $data = PrdCategory::orderBy('id','desc')->get();
        return $data;
    }
}
