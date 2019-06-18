<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'responses';

    protected $guarded  = ['id'];

    public function question() {
        return $this->belongsTo(Question::class, 'question_id');
    }


    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
