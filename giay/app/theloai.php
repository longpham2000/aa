<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    //
    protected $table = 'theloai';
    protected $primaryKey = 'id_theloai';

    public function loaigiay()
    {
    	return $this->hasMany('App\loaigiay', 'id_theloai');
    }
}
