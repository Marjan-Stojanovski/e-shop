<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = [
      'order_id',
      'pdf'
    ];

    public function link()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
