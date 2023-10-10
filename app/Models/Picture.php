<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table = 'pictures';

    protected $fillable = [
        'album_id',
        'image',
        'youtube_link'
    ];


    public function setPicturesAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

}
