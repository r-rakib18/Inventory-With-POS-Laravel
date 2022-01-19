<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    use HasFactory;
    protected $table = 'vats';
    protected $fillable = [
        'item_head',
        'description',
        'value',
        'status',
    ];
    public function products(){
        return $this->hasMany(Product::class,'vat_id','id');
    }




}
