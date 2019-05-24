<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $guarded  = ['id'];

    public function cities() {
        return $this->hasMany(City::class, 'country_id');
    }
}
