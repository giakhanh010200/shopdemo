<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Manufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturer';
    public $fillable = [
        'id',
        'name'
    ];
    public $timestamps = false;
    public function getAllData(){
        $data = Manufacturer::orderBy('id','desc')->get();
        return $data;
    }
    // public function product(){
    //     return $this->belongsTo(Products::class,'manufacturer_id','id');
    // }
}
