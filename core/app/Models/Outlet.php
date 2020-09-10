<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $table = 'outlet';

    protected $fillable = [
        'bisnis_id', 'nama', 'variasi_id', 'quantity', 'hrg_beli', 'total_hrg', 'qty_jual', 'qty_sesuaikan', 'qty_retur'
    ];
    public function daerah()
    {
        return $this->belongsTo('App\Models\Daerah', 'daerah_id', 'id');
    }

    public function bisnis()
    {
        return $this->belongsTo('App\Models\Daerah', 'daerah_id', 'id');
    }
}
