<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\anh_giay;
use App\giay;
use App\loaigiay;
use App\product;
use App\theloai;
use App\User;

class show_product extends Controller
{
	public function show_index()
	{
		# code...
		$sp = giay::limit(25)
                ->get();
		return view('web.index' , ['data' => $sp]);
	}

	public function show_loaigiay($value , $loaigiay = "")
	{
		# code...
		if(isset($value)){
			$data = giay::join('loaigiay' , 'loaigiay.id_loaigiay' , '=' , 'giay.id_loaigiay')
			->join('theloai' , 'theloai.id_theloai' , '=' , 'loaigiay.id_theloai')
			->where('theloai.mota' , $value)
			->select('theloai.name' , 'theloai.mota as tlmota' , 'giay.id_giay' , 'giay.name as giayname' , 'giay.cost' )
			->limit(50)
			->get();
			$loaigiay = loaigiay::join('theloai' , 'theloai.id_theloai' , '=' , 'loaigiay.id_theloai')
								->where('theloai.mota' , $value)
								->select('loaigiay.id_loaigiay' , 'loaigiay.name' )
               					->get();
			return view('web.theloai', ['datas' => $data , 'loaigiays' => $loaigiay]);
		}
	}

	public function search(Request $request)
	{
		# code...
		$request->validate([
			'search' => 'required'
		]);
		if(isset($request->search)){
			$data = giay::join('loaigiay' , 'loaigiay.id_loaigiay' , '=' , 'giay.id_loaigiay')
			->join('theloai' , 'theloai.id_theloai' , '=' , 'loaigiay.id_theloai')
			->select('theloai.name' , 'theloai.mota as tlmota' , 'giay.id_giay' , 'giay.name as giayname' , 'giay.cost' )
			->where('giay.name' ,'like', '%'.$request->search.'%')
			->limit(50)
            ->get();
			return view('web.search', ['datas' => $data]);
		}
	}

	public function show_details($id)
	{
		# code...
		$sp = giay::find($id);
		$anh = $sp->anh_giay;
		return view('web.product_detail', ['sp'=> $sp, 'anh'=> $anh]);
	}
}
    
