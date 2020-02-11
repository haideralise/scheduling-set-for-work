<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpEvaluation extends Model
{
    protected $table="emp_evaluation";
    public $timestamps = false;

    public function questions(){
        return $this->belongsToMany('App\EvaQuestion', 'eva_options', 'eva_id', 'question_id');
    }
}
