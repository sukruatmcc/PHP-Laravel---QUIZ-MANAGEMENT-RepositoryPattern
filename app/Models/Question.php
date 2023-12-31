<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function myAnswer()
    {
        return $this->hasOne('App\Models\Answer', 'question_id','id')->where('user_id', auth()->user()->id);
    }
}
