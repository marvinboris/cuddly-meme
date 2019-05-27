<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    protected $table = 'attestations';

    protected $guarded  = ['id'];
}
