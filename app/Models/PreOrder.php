<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreOrder extends Model
{
    protected $tabel ='pre_order';
    protected $primaryKey = 'id_order';
    protected $fillable = [
       
        'id_order',
        'date_order',
        'note',
        'user_id',
        'id_pack',
        'created_at',
        'updated_at'
    ];
    public function tour()
    {
        return $this->belongsTo(Packet::class, 'id_pack');
    }
}