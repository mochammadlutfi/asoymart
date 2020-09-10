<?php

namespace Modules\Wilayah\Entities;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'reg_villages';

    public function kecamatan()
    {
        return $this->belongsTo('Modules\Wilayah\Entities\Kecamatan', 'district_id', 'id');
    }
}
