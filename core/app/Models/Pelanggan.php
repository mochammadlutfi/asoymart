<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $fillable = [
        'nama', 'no_ktp', 'telp', 'hp', 'daerah_id', 'alamat', 'email', 'keterangan', 'mitra_id'
    ];

    public function daerah()
    {
        return $this->belongsTo('App\Models\Daerah', 'daerah_id', 'id');
    }
}
