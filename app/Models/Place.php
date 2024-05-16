<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'place';
    protected $primaryKey = 'id_place';
    protected $fillable = [
        'place_name',
        'hotline',
        'location',
        'description',
        'isActive',
        'place_img',
        'id_region'
    ];
}
