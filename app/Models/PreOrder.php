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
        'state',
        'updated_at'
    ];
    public function tour()
    {
        return $this->belongsTo(Packet::class, 'id_pack');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function rate()
    {
        return $this->hasMany(rate::class, 'id_rate');
    }
}