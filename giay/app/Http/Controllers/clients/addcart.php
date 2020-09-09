<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\anh_giay;
use App\giay;
use App\loaigiay;
use App\product;
use App\theloai;
use App\User;
class addcart extends Controller
{
    //
    public function index(Request $Request)
    {
    	# code...

        $giay = giay::findOrFail($Request->product_id);

        Cart::add([
            'id' => $Request->product_id,
            'name' => $giay->name,
            'price' => $giay->cost,
            'quantity' => $Request->quantity,
            
        ]);
        
        return response()->json([
            'cartTotalQuantity' => Cart::getTotalQuantity()
        ], 200);

    }

    public function getcart()
    {
        # code...
        if (!Cart::isEmpty()) {
            # code...
            return view('web.cart', ['data'=> $this->getdatacart()]);
        }else return view('web.cart', ['data'=> ""]);
        

    }

    public function getdatacart()
    {
        # code...
        $i = 0;
        if (!Cart::isEmpty()) {
            # code...
                $a = Cart::getContent();
            foreach ($a as $value) {
                # code...
                $i++;
                $anh_giay = giay::findOrFail($value->id)->anh_giay[0]->url;
                $data[$i] = array('anh_giay'=> $anh_giay, 'value'=> $value);
            }
            if (isset($data)) {
                # code...
            }
            return $data;
         }else return false;
        
    }

    public function removecart(Request $request)
    {
        # code...

        $request->validate([
            'product_id' => 'required',

        ]);
        Cart::remove($request->product_id);
        return response()->json(['cartTotalQuantity' => Cart::getTotalQuantity()]);

    }
    
   public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric'
        ]);

        Cart::update($request->product_id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ]
        ]);

        return response()->json([
            'itemSubTotal' => number_format(Cart::get($request->product_id)->getPriceSum()),
            'total' => number_format(Cart::getTotal())
        ], 200);
    }
}
