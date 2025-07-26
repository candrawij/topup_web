<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'image'
    ];

    protected $attributes = [
        'category' => 'topup',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }

    protected $appends = ['image_url']; // Untuk akses image_url

    const CATEGORIES = [
        'topup' => 'Top Up Game',
        'voucher' => 'Voucher',
        'ewallet' => 'E-Wallet'
    ];

    public function getCategoryAttribute($value)
    {
        $value = strtolower(trim($value));
        
        if (Str::contains($value, ['top', 'up'])) return 'topup';
        if (Str::contains($value, ['voucher', 'vcr'])) return 'voucher';
        if (Str::contains($value, ['ewallet', 'e-wallet'])) return 'ewallet';
        
        return in_array($value, array_keys(self::CATEGORIES)) ? $value : 'topup';
    }

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = strtolower(trim($value));
    }

    public static function validateCategory()
    {
        return Rule::in(array_keys(self::CATEGORIES));
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $this->getCategoryAttribute($category));
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : null;
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}