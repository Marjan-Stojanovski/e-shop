<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'alcohol',
        'price',
        'discount',
        'discounted_price',
        'category_id',
        'brand_id',
        'volume_id',
        'user_id',
        'country_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function volume()
    {
        return $this->belongsTo(Volume::class, 'volume_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function pictures()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

}
