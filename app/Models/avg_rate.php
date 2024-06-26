<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avg_rate extends Model
{
    use HasFactory;
    protected $table = 'avg_rate';
    protected $primaryKey ='id_pack';
    protected $fillable = ['id_pack', 'avgrate'];
    public $timestamps = true;
}
