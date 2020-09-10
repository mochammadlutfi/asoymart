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
        'nama', 'slug', 'kategori_id', 'has_variasi', 'bisnis_id'
    ];

    public function kategori()
    {
        return $this->belongsTo('Modules\Produk\Entities\Kategori', 'kategori_id');
    }

    public function bisnis()
    {
        return $this->belongsTo('Modules\Mitra\Entities\Bisnis');
    }

    public function produk_variasi()
    {
        return $this->hasMany('Modules\Produk\Entities\ProdukVariasi', 'produk_id');
    }

    public function foto() {
        return $this->hasMany('Modules\Produk\Entities\ProdukFoto');
    }

    public function fotoUtama() {
        return $this->hasMany('Modules\Produk\Entities\ProdukFoto')->where('is_utama', 1)->first();
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama')
            ->saveSlugsTo('slug');
    }

}
