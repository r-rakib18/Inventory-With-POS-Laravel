<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'warehouses';
    protected $fillable = [
        'name',
        'address',
        'type',
        'status',
    ];
}
