<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Borrower;
use App\borrower_item;
use App\User;
use App\Inventory;
use App\Report;
use Illuminate\Support\Facades\Auth;
use DB;
class StaffController extends Controller
{
    public function __construct(){
        $this->middleware('staffcheck');
    }
    public function main(){
    	$items = Item::where('category_id',1)->paginate(10);
    	return view('staff.main', compact('items'));
    }

    public function staff_consume(){
        $items = Item::where('category_id',2)->paginate(10);
        return view('staff.consume', compact('items'));
    }

    public function staff_borrow($item_id){
    	$find_item = Item::find($item_id);
    	if(!$find_item){
    		abort(404);
    	}
        $users = User::where('role_id',2)->get();
    	return view('staff.borrow', compact('find_item', 'users'));
    }
    public function borrow_item(Request $request, $item_id){
    	$this->validate($request, [
    		'user_id' => 'required|max:15',
    		'days' =>'required',
    		'quantity'=> 'required|max:4'
    	]);

    	

        $report = new Report;
        $report->borrower_id = $request['user_id'];
        $report->item_id = $item_id;
        $report->quantity = $request['quantity'];
        $report->status = 0;
        $report->save();

    	

        $borrower_item = new borrower_item;
        $borrower_item->borrower_id = $request['user_id'];
        $borrower_item->item_id = $item_id;
        $borrower_item->quantity = $request['quantity'];
        $borrower_item->status = 0;
        $borrower_item->save();

        DB::table('borrower_item_days')->insert([
        'days'      => $request['days'],
        'borrower_item_id'=> $borrower_item->id
    
        ]);

        

    	$item = Item::find($item_id);
    	$item->quantity = $item->quantity - $request['quantity'];
    	Item::where('id',$item_id)->update(['quantity'=> $item->quantity]);

    	return redirect()->route('staff')->with('borrow', 'You have borrwed successfully');
    }

    public function view_borrowed_item($item_id){
    	$find_item = Item::find($item_id);
    	$borrowers = borrower_item::distinct('borrower_id')->where('item_id', $item_id)->where('status', 0)->get();
    	return view('staff.view_borrowed',compact('find_item', 'borrowers'));
    }
    public function staff_return($item_id, $borrowed_id){
    	$item = Item::find($item_id);
    	borrower_item::where('id',$borrowed_id)->where('status', 0)->update(['status'=> 1]);
    	$borrower_item = borrower_item::find($borrowed_id);

        $report = new Report;
        $report->borrower_id = $borrower_item->borrower_id;
        $report->item_id = $item_id;
        $report->quantity = $item->quantity;
        $report->status = 1;
        $report->save();

    	$quantity = $item->quantity + $borrower_item->quantity;
    	Item::where('id', $item_id)->update(['quantity'=> $quantity]);
    	return redirect()->back()->with('quantity', 'Item has been return successfully');
    }
    public function add_item(Request $request){
        $this->validate($request, [
            'name' => 'required|max:30',
            'quantity' => 'required|max:5'
        ]);


        $user = User::findOrFail(Auth::id());
        $inventory = new Inventory;
        $inventory->category_id = $request['category'];
        $inventory->name = $request['name'];
        $inventory->quantity = $request['quantity'];
        $user->inventory()->save($inventory);

        $item = new Item;
        $item->category_id = $request['category'];
        $item->name = $request['name'];
        $item->quantity = $request['quantity'];
        $user->item()->save($item);
        return redirect()->back()->with('item', 'You have successfully added new item');
    }

    public function search(Request $request){
        $this->validate($request, [
            'search'=> 'required',
        ]);
        $items = Item::where('name','LIKE',$request['search'])->get();
        return view('staff.search', compact('items'));
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('index');
    }

    public function staff_inventory(){
        $items = Inventory::paginate(10);
        return view('staff.inventory', compact('items'));
    }

    public function staff_report(){
        $reports = Report::paginate(10);
        return view('staff.reports', compact('reports'));
    }

    public function staff_inventory_new(){
        return view('staff.inventory_new');
    }

    public function comsume_item(Request $request, $item_id){
        
        $this->validate($request, [
            'user_id' => 'required|max:15',
            
            'quantity'=> 'required|max:4'
        ]);

        

        $report = new Report;
        $report->borrower_id = $request['user_id'];
        $report->item_id = $item_id;
        $report->quantity = $request['quantity'];
        $report->status = 3;
        $report->save();

        $borrower_item = new borrower_item;
        $borrower_item->borrower_id = $request['user_id'];
        $borrower_item->item_id = $item_id;
        $borrower_item->quantity = $request['quantity'];
        $borrower_item->status = 3;
        $borrower_item->save();

        

        $item = Item::find($item_id);
        $item->quantity = $item->quantity - $request['quantity'];
        Item::where('id',$item_id)->update(['quantity'=> $item->quantity]);

        return redirect()->route('staff')->with('borrow', 'You have consume successfully');
    }

    public function consume_item($item_id){
        $find_item = Item::find($item_id);
        if(!$find_item){
            abort(404);
        }
        $users = User::where('role_id',2)->get();
        return view('staff.consume_view', compact('find_item','users'));
    }

    public function staff_newsupply($id){
        return $id;
    }

    public function staff_users(){
        $users = User::where('role_id',1)->get();
        return view('staff.staff', compact('users'));
    }

    public function staff_end_users(){
         $users = User::where('role_id',2)->get();
        return view('staff.users', compact('users'));
    }

    public function staff_mr(){
        return view('staff.mr');
    }

}
