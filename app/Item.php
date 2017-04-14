<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\borrower_item;

class Item extends Model
{
    public function borrowed_item($item_id){
    	return $borrowed_item = borrower_item::where('item_id', $item_id)->where('status', 0)->sum('quantity');
    }
}
