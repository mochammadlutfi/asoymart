<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Order extends Model
{
    use Uuid;

    protected $table = 'order';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'status', 'bayar_status', 'alamat_kirim', 'user_id', 'final_total', 'tgl_transaksi'
    ];

    public function bayaran()
    {
        return $this->hasMany('App\Models\TransaksiBayar', 'transaksi_id');
    }

    public function outlet()
    {
        return $this->belongsTo('App\Models\Outlet', 'outlet_id');
    }

    public function mitra()
    {
        return $this->belongsTo('App\Models\Mitra', 'dibuat_oleh', 'id');
    }

    public function pembelian()
    {
        return $this->hasMany(\App\Models\Pembelian::class);
    }

    public function penjualan()
    {
        return $this->hasMany(\App\Models\Penjualan::class);
    }

    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class);
    }
}
