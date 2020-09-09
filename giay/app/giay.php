<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giay extends Model
{
    //
    protected $table = 'giay';
    protected $primaryKey = 'id_giay';

    public function anh_giay()
    {
    	return $this->hasMany('App\anh_giay', "id_giay");
    }
}
