<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'no_penerbangan',
        'nama_maskapai',
        'dari_bandara',
        'tujuan_bandara',
        'tanggal_keberangkatan',
        'jam_pergi',
        'jam_sampai',
        'jumlah_kursi',
        'price',
    ];

    public function user(){
        return $this->belongsTo(user::class, 'user_id');
    }
}
