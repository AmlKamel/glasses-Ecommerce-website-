<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\Product;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    
   /* public function addToCart(Product $prod,User $user)
    {
        $carts =Cart::where('user_id',$user->id)->where('product_id',$prod->id)->get();

        if($carts->isEmpty())
        {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $prod->id;
            $cart->quantity=1;

        }
        else
        {
            $cart = $carts->first();
            $cart->quantity +=1;
        }
        
        $cart->save();

        return back();

    }*/



	public function store(Product $product)
	{
	//    	$p=Product::find($product);
		$carts=Cart::where('user_id',auth()->user()->id)->where('product_id',$product->id)->get();
	//	    dd($carts);
		if($carts->isEmpty())
		{
			$cart=new Cart();
			$cart->user_id=auth()->user()->id;
			$cart->product_id=$product->id;
			$cart->quantity=1;
			$cart->save();
		}
		else
		{
			$cart=$carts->first();
			$cart->quantity+=1;
			$cart->save();
		}

	//	    dd($cart);

	    return redirect()->back();
    }

    public function show()
    {

        $carts=Cart::where('user_id',auth()->user()->id)->get();
        /*$carts =  DB::table('carts')
                     ->where('user_id', '=', auth()->user()->id)
                     ->get(); */

        return view('cart',compact('carts'));
    }

    public function edit($id,Request $request)
    {
        $cart=Cart::find($id);
        $cart->quantity=$request->input('quantity');
        $cart->save();
        return back();
    }

    public function delete($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return back();
    }



}
