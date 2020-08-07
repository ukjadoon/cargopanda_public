<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AuthToken extends Model
{
    protected $fillable = ['email'];

    public function setToken()
    {
        $this->token = strtolower(Str::random(20));

        return $this;
    }
}
