<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table = 'photos';
    protected $primaryKey = 'photoId';

    protected $fillable = ['photo_title', 'photo_description', 'upload_date', 'file_location', 'albumId', 'userId'];

    public function user(){
        return $this->belongsTo(User::class, 'userId');
    }
    public function album(){
        return $this->belongsTo(Album::class);
    }
    public function comments()
    {
    return $this->hasMany(PhotoComment::class, 'photoId');
    }
    public function like()
    {
    return $this->hasMany(Like::class, 'photoId');
    }

}
