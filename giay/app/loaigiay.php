<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaigiay extends Model
{
    //
    protected $table = 'loaigiay';
    protected $primaryKey = 'id_loaigiay';

    public function giay()
    {
    	return $this->hasMany('App\giay', "id_loaigiay");
    }
}
