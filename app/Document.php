<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['name', 'description', 'type'];

    public function organizations()
    {
        return $this->belongsToMany('App\Organization')->using('App\DocumentOrganization')->withPivot('url', 'status', 'comment', 'expires_on')->withTimestamps();
    }

    public function trucks()
    {
        return $this->belongsToMany('App\Truck')->using('App\DocumentTruck')->withPivot('url', 'status', 'comment', 'expires_on')->withTimestamps();
    }
}
