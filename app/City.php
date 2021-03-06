<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $guarded  = ['id'];

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
