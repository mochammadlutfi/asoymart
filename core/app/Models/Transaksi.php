<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $table = 'transaksi';

    protected $fillable = [
        'bisnis_id', 'outlet_id', 'tipe', 'status', 'bayar_status', 'invoice_no', 'supplier_id', 'ref_no', 'tgl_transaksi', 'total', 'diskon_tipe', 'diskon_nilai', 'detail_pengiriman', 'biaya_pengiriman', 'stok_awal_produk_id', 'keterangan', 'ket_staf', 'final_total', 'dibuat_oleh'
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
