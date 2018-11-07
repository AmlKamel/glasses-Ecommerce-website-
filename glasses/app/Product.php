<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    
    public function suppliers()
    {
        return $this->belongsToMany('App\Supplier','product_supplier_relationships','prod_id','supp_id');
    }

    public function carts()
    {
	    return $this->hasMany('App\Cart','product_id','id');
    }
}
