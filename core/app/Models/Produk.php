<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasSlug;
    protected $table = 'produk';
    protected $fillable = [
        'nama', 'slug', 'kategori_id', 'has_variasi', 'bisnis_id', 'var1_nama', 'var2_nama', 'var1_value', 'var2_value'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'kategori_id');
    }

    public function bisnis()
    {
        return $this->belongsTo('App\Models\Bisnis');
    }

    public function produk_variasi()
    {
        return $this->hasMany('App\Models\ProdukVariasi', 'produk_id');
    }

    public function getHargaAttribute($value)
    {
        if($this->produk_variasi()->count() > 1)
        {
            // return $this->produk_variasi
            if($this->produk_variasi->min('harga') === $this->produk_variasi->max('harga'))
            {
                return "Rp" .number_format($this->produk_variasi->max('harga'),0,',','.');
            }else{
                return "Rp" .number_format($this->produk_variasi->min('harga'),0,',','.').' - '."Rp" .number_format($this->produk_variasi->max('harga'),0,',','.');
            }
        }else{
            return "Rp" .number_format($this->produk_variasi[0]['harga'],0,',','.');
        }
    }

    public function getHargaFormatAttribute($value)
    {
        if($this->produk_variasi()->count() > 1)
        {
            // return $this->produk_variasi
            if($this->produk_variasi->min('harga') === $this->produk_variasi->max('harga'))
            {
                return number_format($this->produk_variasi->max('harga'),0,'','');
            }else{
                return number_format($this->produk_variasi->min('harga'),0,',','').' - '.number_format($this->produk_variasi->max('harga'),0,'','');
            }
        }else{
            return number_format($this->produk_variasi[0]['harga'],0,'','');
        }
    }

    // public function getVar2PilihanAttribute($value)
    // {
    //     return implode(",", json_decode($value));
    // }

    public function foto() {
        return $this->hasMany('App\Models\ProdukFoto');
    }

    public function fotoUtama() {
        return $this->hasMany('App\Models\ProdukFoto')->where('is_utama', 1)->first();
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama')
            ->saveSlugsTo('slug');
    }

}
