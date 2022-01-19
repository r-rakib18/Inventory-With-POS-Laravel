<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
        'image',
        'parent_id',
        'status',
    ];


    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }

















}
