<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'category_id',
        'description',
        'user_id',
        'brand_id',
        'volume_id',
        'alcohol',
        'price',
        'action',
        'discount',
        'country_id'
    ];

    public static function search($keyword)
    {
        return Product::join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.name as brand_name')
            ->where(function ($query) use ($keyword) {
                $query->where('products.title', 'like', '%' . $keyword . '%')
                    ->orWhere('brands.name', 'like', '%' . $keyword . '%');
            })
            ->paginate(5);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'product_id', 'id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
