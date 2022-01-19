<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
    ];
    public function brands(){
        return $this->hasMany(Product::class,'brands_id','id');
    }
}
