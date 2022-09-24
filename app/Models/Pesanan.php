<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';

    protected $fillable = [
        'cart_id',
        'user_id',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'postcode',
        'metode_pembayaran'
    ];
}
