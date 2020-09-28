<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class OrderBayar extends Model
{
    use Uuid;

    protected $table = 'order_bayar';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'order_id', 'method', 'merchant', 'jumlah', 'tgl_bayar', 'status'
    ];

    public function variasi()
    {
        return $this->belongsTo('App\Models\ProdukVariasi', 'variasi_id');
    }
}
