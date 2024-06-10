<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackCategory extends Model
{
    protected $table = 'tour_category';
    protected $primaryKey = 'id_category';
    protected $fillable = [
        'category_name',
        'category_desc',
        'category_image',
        'isActive'
       
    ];
}
