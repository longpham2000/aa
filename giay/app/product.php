<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $table = 'giay';
    protected $primaryKey = 'id_giay';

    public function loaigiay()
    {
    	return $this->belongsto('App\loaigiay', "id_loaigiay");
    }
}
