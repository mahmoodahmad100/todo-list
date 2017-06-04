<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App\Item;

class ItemController extends Controller
{
    public function getItems()
    {
    	$items = Item::where('user_id',Auth::user()->email)->get();
    	return view('items',compact('items'));
    }

    public function postItems(Request $request)
    {
		$this->validate($request,[
				'item' => 'required'
			]);   
		$item = new Item();
		$item->user_id = Auth::user()->email;	
		$item->item = $request['item'];	
		$item->done = 0;	
		$item->save();	

		Session::flash('success_msg','<strong>Well done!</strong> you added new item!');
		return redirect()->back();
    }

    public function postEditItem($item_id)
    {  
		$item = Item::where('id',$item_id)->first();	
		$item->done = 1;	
		$item->update();	

		Session::flash('success_msg','<strong>Well done!</strong> you done the item!');
		return redirect()->back();
    }

    public function postDeleteItem($item_id)
    {  
		$item = Item::where('id',$item_id)->delete();	
		Session::flash('success_msg','<strong>Well done!</strong> you deleted the item!');
		return redirect()->back();
    }
}
