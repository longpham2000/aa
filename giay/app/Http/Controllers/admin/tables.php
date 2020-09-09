<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\anh_giay;
use App\giay;
use App\loaigiay;
use App\product;
use App\theloai;
use App\User;

class tables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tables');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($table="")
    {
        //
        if($table=='product'){
            $data = theloai::join('loaigiay' , 'theloai.id_theloai' , '=' , 'loaigiay.id_theloai')
                    ->rightJoin('giay' , 'loaigiay.id_loaigiay' , '=' , 'giay.id_loaigiay')
                    ->select(
                        'theloai.name as name3' , 
                        'loaigiay.name as name2',
                        'giay.name as name1' , 'giay.cost as cost'  , 'giay.id_giay as id'
                    )->get();
                    
                    $form = array('Tên', 'Giá', 'Thuộc loại giày','Thuộc thể loại');
            return view('admin.tables' , ['data' => $data, 'form'=>$form, 'table_name'=> 'Sản phẩm', 'table_khongdau'=> $table]);
        }elseif($table=='loaigiay'){
            $data = loaigiay::join('theloai' , 'theloai.id_theloai', '=', 'loaigiay.id_theloai')
                    ->select('loaigiay.name as name1',
                    'theloai.name as name2',
                    'loaigiay.anh_url as anh',
                    'loaigiay.mota as mota',
                    'loaigiay.name_khongdau as khongdau',
                    'loaigiay.id_loaigiay as id')
                    ->get();
            $form = array('Ảnh','Tên', 'Tên không dấu', 'Mô tả','Thuộc thể loại');
            return view('admin.tables', ['data'=> $data, 'form'=> $form, 'table_khongdau'=> $table, 'table_name'=> 'Loại giày']);
        }elseif ($table=='theloai') {
            # code...
            $data = theloai::select('id_theloai as id', 'name as name1', 'name_khongdau as khongdau', 'anh_url as anh')->get();
            $form = array('Ảnh', 'Tên', 'Tên không dấu');
            
            return view('admin.tables', ['data'=> $data, 'form'=> $form, 'table_name'=> 'thể loại', 'table_khongdau'=> $table]);
        }else{
            return view('admin.404');
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
