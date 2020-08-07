<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentDefinition extends Model
{
    protected $fillable = ['name', 'description', 'type'];
}
