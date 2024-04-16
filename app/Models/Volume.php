<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    use HasFactory;

    protected $table = 'volumes';

    protected $fillable = [
        'volume'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'volume_id');
    }
}
