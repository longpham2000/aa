<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'id_orders';

    public function orders_product()
    {
    	# code...
    	return hasMany('App/orders_product', 'id_orders_product');
    }
}
