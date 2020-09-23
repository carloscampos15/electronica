<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name', 'serial',
    ];

    public function dump()
    {
        return $this->hasOne('App\Dump');
    }
}
