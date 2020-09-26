<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Kalnoy\Nestedset\NodeTrait;

class Kategori extends Model
{
    use HasSlug;
    use NodeTrait;

    protected $table = 'kategori';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'slug', 'parent_id', 'icon', 'cover',
    ];

    public function sub_kategori(){

        return $this->hasMany('App\Models\Kategori', 'parent_id');

    }

    public function parent(){
        return $this->belongsTo('App\Models\Kategori', 'parent_id');
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

    public function getThumbnailAttribute($value)
    {
        return 'uploads/'.$value;
    }

    public function getCreatedAtAttribute($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
    }

}
