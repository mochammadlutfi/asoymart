<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{

    protected $table = 'rekening';

    protected $fillable =[
        'user_id', 'bank_id', 'nama', 'rekening_no'
    ];

    protected $appends =[
        'nama_bank'
    ];

    public function bank()
    {
        return $this->belongsTo('App\Models\Bank', 'bank_id');
    }

    public function getNamaBankAttribute()
    {
        return $this->bank->name;
    }


}
