<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    protected $table = 'tour_packet';
    protected $fillable=[
        'pack_title',
        'pack_desc',
        'pack_price',
        'start_date',
        'pack_duration',
        'pack_number',
        'pack_img',
        'id_supp',
        'isActive',
        'id_place',
        'id_category'
    ];
    protected $primaryKey = 'id_pack';
    public function place()
    {
        return $this->belongsTo(Place::class, 'id_place');
    }
    public function avgrate()
    {
        return $this->belongsTo(avg_rate::class, 'id_pack');
    }
    public function rate(){
        return $this->hasMany(Rate::class, 'id_pack');
    }
    public function avgrating(){
        return round($this->rate()-> avg('rating')?: 0);
    }
    
}
