<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'user_id', 'game_id', 'nickname', 'jumlah', 'total_harga', 'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
