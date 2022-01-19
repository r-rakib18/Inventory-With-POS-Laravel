<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varient extends Model
{
    use HasFactory;
    protected $table = 'varients';
    protected $fillable =[
        'key',
        'value',
        'status',
        
    ];
}
