<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    protected $table = 'attestations';

    protected $guarded  = ['id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function file() {
        return $this->belongsTo(File::class, 'file_id');
    }
}
