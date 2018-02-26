<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function item(){
    	return $this->belongsTo('App\Item');
    }

    public function borrow(){
    	return $this->belongsTo('App\User','borrower_id','id');
    }


}
