<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model {
    protected $guarded = [];

    /**
	* To allow soft deletes
	*/
    use SoftDeletes;

    public function transactions() {
        return $this->hasMany(Transaction::class, 'payment_option_id');
    }

}
