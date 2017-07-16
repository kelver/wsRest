<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'phone'
    ];

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
