<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Etalase extends Model
{
    use Uuid;

    protected $table = 'etalase';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id', 'nama', 'urutan',
    ];

}
