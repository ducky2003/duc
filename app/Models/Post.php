<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'id_post';
    protected $fillable = [
        'post_title',
        'post_content',
        'post_img',
        'post_date',
        'id_supp',
        'id_place',
        'isActive',
        'created_at',
        'updated_at',
        'post_desc'
    ];
     public function place()
     {
         return $this->belongsTo(Place::class, 'id_place');
     }
     public function supplier()
     {
         return $this->belongsTo(Supplier::class, 'id_supp');
     }
     public function comments()
     {
         return $this->hasMany(Comment::class,'id_post');
     }
}
