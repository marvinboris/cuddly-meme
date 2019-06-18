<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityArea extends Model
{
    protected $table = 'activity_areas';

    protected $guarded  = ['id'];

    /**
    * To allow soft deletes
    */
    use SoftDeletes;

    public function users() {
        return $this->hasMany(User::class, 'activity_area_id');
    }
}
