<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table = 'vendors';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'bank_name',
        'bank_ac',
        'routing_number',
        'tin_number',
        'bin_number',
        'mobile_banking_type',
        'mobile_banking_number',
        'status',
    ];

    public function products(){
        return $this->hasMany(Product::class,'vendor_id','id');
    }
}
