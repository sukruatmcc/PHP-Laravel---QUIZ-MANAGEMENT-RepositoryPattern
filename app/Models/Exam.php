<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function question()
    {
        return $this->hasMany('App\Models\Question', 'exam_id','id');
    }

    public function myResult()
    {
      return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id);
    }
}
