<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobLocation extends Model
{
    //
    protected $table="company_location";
    protected $fillable = [
        'location_name',
    ];
    public $timestamps = false;
}
