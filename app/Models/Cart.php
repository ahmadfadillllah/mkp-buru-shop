<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'produk_id',
        'quantity',
        'status'
    ];

    public function produk(){
        return $this->belongsTo(Produk::class);
    }
}
