<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region';
    protected $primaryKey = 'id_region';
    protected $fillable = [
       
        'region_name',
        'isActive',
        'region_image'
    ];
}
