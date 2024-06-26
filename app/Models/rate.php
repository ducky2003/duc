<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    protected $table = 'rate';
    protected $primaryKey = 'id_rate';
    protected $fillable = [
        'id_rate',
        'is_pack',
        'rating',
    ];
    public function pack(){
        return $this->belongsTo(Packet::class,'id_pack');
    }
}
