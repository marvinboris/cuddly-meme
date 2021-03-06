<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends EloquentUser {
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */

    protected $table = 'users';

    protected $guarded = ['id'];

    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
    * To allow soft deletes
    */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function activityArea() {
        return $this->belongsTo(ActivityArea::class, 'activity_area_id');
    }

    public function cv() {
        return $this->belongsTo(File::class, 'cv_file_id');
    }

    public function pic() {
        return $this->belongsTo(File::class, 'pic_file_id');
    }

    public function video() {
        return $this->belongsTo(File::class, 'video_file_id');
    }

    public function responses() {
        return $this->hasMany(Response::class, 'user_id');
    }

    public function attestations() {
        return $this->hasMany(Attestation::class, 'user_id');
    }

    public function transactions() {
        return $this->hasMany(Transaction::class, 'user_id');
    }
}
