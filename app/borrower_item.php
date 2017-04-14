<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class borrower_item extends Model
{
    public function borrower(){
    	return $this->belongsTo('App\Borrower');
    }
    public function item(){
    	return $this->belongsTo('App\Item', 'item_id','id');
    }
}
