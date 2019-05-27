<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PaymentMethod extends Model {
    protected $guarded = [];

    /**
	* To allow soft deletes
	*/
    use SoftDeletes;

    public function transactions() {
        return $this->hasMany(Transaction::class, 'method', 'vendor');
    }

}
