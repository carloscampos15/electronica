<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dump extends Model
{
    protected $fillable = [
        'address', 'weight', 'level', 'device_id'
    ];

    public function device()
    {
        return $this->belongsTo('App\Device');
    }
}
