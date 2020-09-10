<?php

namespace Modules\Produk\Entities;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Kategori extends Model
{
    use HasSlug;

    protected $table = 'kategori';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'slug', 'parent_id', 'icon', 'position', 'is_searchable', 'is_active'
    ];

    public function sub_kategori(){

        return $this->hasMany('Modules\Produk\Entities\Kategori', 'parent_id');

    }

    public function parent(){
        return $this->belongsTo('Modules\Produk\Entities\Kategori', 'parent_id');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama')
            ->saveSlugsTo('slug');
    }

    public function getParentIdAttribute($value)
    {
        if (is_null($value)) {
            $value = 0;
        }
        return $value;
    }

    public function getCreatedAtAttribute($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
    }

}
