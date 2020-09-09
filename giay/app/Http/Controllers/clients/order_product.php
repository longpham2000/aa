<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendmail;

use App\orders;
use App\orders_giay;

use App\anh_giay;
use App\giay;
use App\loaigiay;
use App\product;
use App\theloai;
use App\User;

class order_product extends Controller
{
    //
    public function index()
    {
        # code...
        return view('web.checkout');
    }

    public function checkOut(Request $request)
    {
    	# code...
    	$request->validate([
    		'ten'=> 'required',
    		'ho'=> 'required' ,
    		'address'=> 'required' ,
    		'email'=> 'required',
    		'phonenumber'=> 'required|numeric',
            'sonha'=> 'required'
    	]);
        
        $id = rand(1000000, 9999990);
        orders::insert([
            'id_orders'=> $id,
            'name'=> $request->ho." ".$request->ten,
            'email'=> $request->email,
            'phone'=> $request->phonenumber,
            'address'=> $request->address,
            'sonha'=> $request->sonha,
            'precessed'=> 0,
            'tienthanhtoans'=> Cart::getTotal()

        ]);
        $cart = Cart::getContent();
        foreach ($cart as  $value) {
            # code...
             orders_giay::insert([
                'id_orders'=> $id,
                'id_giay'=> $value->id,
                'cost'=> $value->price*$value->quantity,
                'quantity'=> $value->quantity
            ]);
        }
        Mail::to($request->email)->send(new sendmail($request,$cart,$id));
        cart::clear();
        return view('web.order_complete');
        
        
       

    }
}
