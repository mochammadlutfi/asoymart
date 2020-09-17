<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $table = 'bank_account';

    protected $fillable = [
        'users_id', 'bank_account_name', 'account_number', 'name',
    ];

    // public function users()
    // {
    // return $this->belongsTo('App\Models\users', 'users_id', 'id');
    // }
}
