<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table="cost_center";
    public $timestamps = false;

    public function department(){
        return $this->belongsTo(
            Department::class,
            'department_id',
            'company_department_id'
        );
    }
}
