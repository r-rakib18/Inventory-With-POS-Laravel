<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'brand_name',
        'category_name',
        'vat_name',
        'image',
        'attribute_set',
        'price',
        'description',
        'sku',
        'barcode',
        'tag',
        'vat_status',
        'status',

    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function brands(){
        return $this->belongsToMany(Brand::class);
//        return $this->belongsToMany(Brand::class,'brand_product');
    }

    public function vats(){
        return $this->belongsToMany(Vat::class);
    }

    public function vendors(){
        return $this->belongsToMany(Vendor::class);
    }







}
