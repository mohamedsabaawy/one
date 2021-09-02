<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
{
    protected $fillable = ['name','email','user_name','password'];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
