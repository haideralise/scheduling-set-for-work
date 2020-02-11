<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaQuestion extends Model
{
    protected $table="eva_questions";
    public $timestamps = false;

    public function evaluations(){
        return $this->belongsToMany('App\EmpEvaluation', 'eva_options', 'question_id', 'eva_id');
    }
}
