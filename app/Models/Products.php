<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $fillable = [
        'id',
        'name',
        'thumbnail',
        'category_id',
        'manufacturer_id',
        'description',
        'sale_price',
        'import_price',
        'rating',
        'ram',
        'rom',
        'quantity',
        'discount',
        'sold',
        'SKU',
        'specifications'
    ];
    public $timestamps = false;

    // public function manufacturer()
    // {
    //     return $this->hasMany(Manufacturer::class,'id','manufacturer_id');
    // }
}
