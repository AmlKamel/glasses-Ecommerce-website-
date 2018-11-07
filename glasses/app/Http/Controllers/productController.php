<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use App\Cart;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    //
    public function show()
    {   

    
      $prods=  Product::paginate(4,['id','prod_name','prod_img','prod_price','Prod_color','Prod_company','prod_quantity'],'p');
        
        return view('products_view',compact('prods'));
    }
    
    public function showtouser()
    {   

        $prods= Product::all();

//$prods=Product::where('prod_quantity',200)->get();

        return view('products_user',compact('prods'));
    }

    public function showtouser2()
    {   

        $prods= Product::all();

//$prods=Product::where('prod_quantity',200)->get();

        return view('products_user2',compact('prods'));
    }


    public function showtoall()
    {   

        $prods= Product::all();

        //$prods=Product::where('prod_quantity',200)->get();

        return view('products_user',compact('prods'));

        //return view('products_all',compact('prods'));
    }

    
    public function add(Request $request)
    {
        $name=$request->input('name');
        $prod=new Product;
        //----------------(prod_name)name of column from database-----------
        //----------------input('quantity')name of column from form---------
        $prod->prod_name=$name;
        $file=$request->file('img');
        $filename=$file->getClientOriginalName();
        $file->move('images',$filename);
        $prod->prod_img=$filename;
     
        $prod->prod_price=$request->input('price');
        $prod->prod_quantity=$request->input('quantity');

        $prod->Prod_company=$request->input('company');

        $prod->prod_color=$request->input('color');


        $prod->save();
        return back();
    }
    public function edit($id,Request $request)
    {
        $prod=Product::find($id);
        $name=$request->input('name');
        $prod->prod_name=$name;
        $prod->prod_price=$request->input('price');
        $prod->prod_quantity=$request->input('quantity');
        $prod->save();
        return back();
    }

    public function delete($id)
    {
        $prod=Product::find($id);
        $prod->delete();
        return back();
    }










    public function view_supp($prod_id)
    {
        $prod=Product::find($prod_id);
        $suppliers=$prod->suppliers; 
        return view('suppliers_view',compact('suppliers','prod_id'));
    }


    public function details($id)
    {
        $prod=Product::find($id);
        return view('detail_view',compact('prod'));

    }
}
