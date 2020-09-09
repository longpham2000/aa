<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Storage;
 use Illuminate\Http\File;

use App\anh_giay;
use App\giay;
use App\loaigiay;
use App\theloai;
use App\User;

class dataauto extends Controller
{
    //
    public function index1()
    {
    	# code...
    	$sosp = 50;
    	//dd($this->anh());
    	for ($i=0; $i < $sosp; $i++) { 
    		# code...
    		$id_giay = rand(100000000, 999999999);
    	giay::insert([
    		'id_giay'=> $id_giay,
    		'name'=> $this->rand_kytu(5),
    		'cost'=> rand(10, 99)."00000",
    		'id_loaigiay'=> rand(2,7),
    		'quantity'=> 100,
    		'mota_ngan'=> $this->rand_kytu(30),
    		'mota_dai'=> $this->rand_kytu(100)
    	]);
    	$anh = $this->anh();
    	for ($i=0; $i < count($anh); $i++) { 
    		# code...
    		anh_giay::insert([
    			"url"=> preg_replace("/(public\/img\/)/", "", $anh[$i]) ,
    			'id_giay'=> $id_giay
    		]);
    	}
    	}
    	
    }
    public function rand_kytu($input)
    {
    	# code...
    	$ar = array('q', 'ư', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a'
    				, 's', 'd', 'f', 'g', 'h', 'j', 'j', 'k', 'l', 
    					'z', 'x', 'c', 'v', 'b', 'n', 'm');
    	$data = "";
    	for ($i=0; $i < $input; $i++) { 
    		# code...
    		for ($j=0; $j < 5; $j++) { 
    			# code...
    			$data.= $ar[rand(0, 25)];
     		}
     		$data.=" ";
    	}
    	return $data;
    }
    public function anh()
    {
    	# code...
    	$anh = Storage::files('public/anh');
    	//$data = Storage::putFile('anh', 'storage/img/111242.jpeg');
    		$rand1 = rand(0, 9);
    		$rand2 = rand(0, 9);
    		$rand3 = rand(0, 9);
    		$rand4 = rand(0, 9);
    		//storage/anh/pair-of-multicolored-low-top-sneakers-1580267.jpg
    		$anh1 = Storage::putFile('public/img', 'storage/anh/'.preg_replace('/(public\/anh\/)/', "", $anh[$rand1]));
    		$anh2 = Storage::putFile('public/img', 'storage/anh/'.preg_replace('/(public\/anh\/)/', "", $anh[$rand2]));
    		$anh3 = Storage::putFile('public/img', 'storage/anh/'.preg_replace('/(public\/anh\/)/', "", $anh[$rand3]));
    		$anh4 = Storage::putFile('public/img', 'storage/anh/'.preg_replace('/(public\/anh\/)/', "", $anh[$rand4]));
    		return array( $anh1, $anh2, $anh3 , $anh4);
    }
    public function index(){
        
        $a = giay::paginate(5);
        return view("web.test",['a'=>$a]);
    }
}
