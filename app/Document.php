<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['name', 'description', 'type'];

    public function organizations()
    {
        return $this->belongsToMany('App\Organization')->using('App\DocumentOrganization');
    }
}
