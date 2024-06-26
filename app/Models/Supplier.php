<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supp';
    protected $fillable = [
       
        'supp_name',
        'isActive',
        'supp_desc',
        'hotline',
        'email',
        'created_at',
        'updated_at',
        'supp_location',
    ];
}