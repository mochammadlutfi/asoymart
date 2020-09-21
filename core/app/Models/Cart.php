<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'produk_id', 'variasi_id', 'qty', 'harga', 'bisnis_id'
    ];


    protected $appends = ['harga_frm'];


    public function produk()
    {
        return $this->belongsTo('App\Models\Produk', 'produk_id');
    }

    public function variant()
    {
        return $this->belongsTo('App\Models\ProdukVariasi', 'variasi_id', 'id');
    }

    public function bisnis()
    {
        return $this->belongsTo('App\Models\Bisnis');
    }

    public function getHargaFrmAttribute($value)
    {
        return "Rp" .number_format($this->attributes['harga'],0,',','.');
    }

}
