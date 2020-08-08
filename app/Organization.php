<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name', 'cif'];

    public function documents()
    {
        return $this->belongsToMany('App\Document')->using('App\DocumentOrganization');
    }
}
