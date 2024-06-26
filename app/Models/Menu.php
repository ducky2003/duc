<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';

    protected $fillable = [
        'menu_name',
        'isActive',
        'created_at',
        'updated_at',
        'route'
    ];
}
