<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table="company_department";
    public $timestamps = false;

    public function costs(){
        return $this->hasMany('App\Cost', 'department_id', 'company_department_id');
    }
}
