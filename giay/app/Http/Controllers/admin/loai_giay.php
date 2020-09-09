<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\anh_giay;
use App\giay;
use App\loaigiay;
use App\product;
use App\theloai;
use App\User;

class loai_giay extends Controller
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
        $theloai = theloai::select('id_theloai' , 'name')->get();
        return view('admin.add_loaigiay' , ['theloais' => $theloai]);
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
       $request->validate([
            'loaigiay'=> 'required|unique:loaigiay,name|max:30',
            'mota'=> 'required|max:50',
            'anh'=> 'required|image|mimes:jpeg,jpg,png|max:2024'
       ]);
            $id_theloai = theloai::where('name' , $request->theloai)->get();
            $khongdau = $this->convert_vi_to_en($request->loaigiay);
            $path = $request->file('anh')->store('public/img');
            loaigiay::insert(
                [
                    'name' => $request->input('loaigiay'),
                    'mota' => $request->input('mota'),
                    'id_theloai' => $id_theloai[0]->id_theloai,
                    'name_khongdau'=> $khongdau,
                    'anh_url'=> preg_replace("/(public\/img\/)/", '', $path)

                    ]
            );
        
        return redirect()->route('loaigiay.create')->with(['message'=> $request->theloai.'đã thêm thành công', 'class'=>'alert alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data = loaigiay::join('theloai', 'theloai.id_theloai', '=', 'loaigiay.id_theloai')
                ->where('loaigiay.id_loaigiay', $id)
                ->select('theloai.name as theloai_name', 'loaigiay.*')
                ->get();
               
        $theloai = theloai::get();
        return view('admin.edit_loaigiay', ['data'=>$data, 'theloai'=>$theloai]);
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
        $request->validate([
            'loaigiay'=> "required|unique:loaigiay,name,$id,id_loaigiay|max:50",
            'mota'=> 'required|max:50',
            'anh'=> 'image|mimes:jpeg,jpg,png|max:2024',
            'theloai'=> 'required'
        ]);
        
        $khongdau = $this->convert_vi_to_en($request->loaigiay);
        $loaigiay = loaigiay::where('id_loaigiay', $id);
        $tb = $loaigiay->update([
                                    'name'=> $request->loaigiay,
                                    'mota'=> $request->mota,
                                    'name_khongdau'=> $khongdau
                                ]);
        if($request->has('anh')){
            $path = $request->file('anh')->store('public/img');
            $old_anh = $loaigiay->get()[0]->anh_url;
            Storage::delete('public/img/'.$old_anh);

            $a = $loaigiay->update([
                'anh_url'=> preg_replace('/(public\/img\/)/', "", $path)
            ]);
        }


        if($tb){
            return redirect()->route('admin.tables', ['data'=> 'loaigiay'])->with(['message'=>"Update ".$request->loaigiay.' thành công', 'class'=> 'alert alert-success']);
        }else
            return redirect()->route('admin.tables', ['data'=> 'loaigiay'])->with(['message'=>"Update ".$request->loaigiay.' thất bại', 'class'=> 'alert alert-danger']);
        

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
        $a = loaigiay::destroy($id);
        if ($a) {
            # code...
            return redirect()->route('admin.tables', ['data'=>'loaigiay'])->with(['message'=>'xóa thành công', 'class'=>'alert alert-success']);
        }
    }

    public function convert_vi_to_en($str) {
                    // từ bỏ dấu
                  $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
                  $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
                  $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
                  $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
                  $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
                  $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
                  $str = preg_replace("/(đ)/", "d", $str);
                  $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
                  $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
                  $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
                  $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
                  $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
                  $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
                  $str = preg_replace("/(Đ)/", "D", $str);

                  // mô tả nghi liền không dấu
                  $str = preg_replace("/[^a-zA-Z0-9_-]+/", "-", $str);
              //    $str = preg_replace("/\W/", "", $str);
                  //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
                  return $str;
              }
    public function convert($str){
        $list_key=array([
            "À"=>"à","Á"=>"á","Ả"=>"ả","Ạ"=>"ạ","Ã"=>"ã",
            "Ắ"=>"ắ","Ằ"=>"ằ","Ẳ"=>"ẳ","Ặ"=>"ặ","Ẵ"=>"ẵ",
            "Ấ"=>"ấ","Ầ"=>"ầ","Ẩ"=>"ẩ","Ậ"=>"ậ","Ẫ"=>"ẫ",
            "É"=>"é","È"=>"è","Ẻ"=>"ẻ","Ẽ"=>"ẹ","Ẹ"=>"ẹ",
            "Ế"=>"ế","Ề"=>"ề","Ể"=>"ể","Ệ"=>"ệ","Ê"=>"ễ",
            "Ó"=>"ó","Ò"=>"ò","Ỏ"=>"ỏ","Ọ"=>"ọ","Õ"=>"õ",
            "Ô"=>"ô","Ố"=>"ố","Ồ"=>"ồ","Ổ"=>"ổ","Ộ"=>"ộ","Ỗ"=>"ỗ",
            "Ơ"=>"ơ","Ớ"=>"ớ","Ờ"=>"ờ","Ở"=>"ở","Ợ"=>"ợ","Ỡ"=>"ỡ",
            "Ú"=>"ú","Ù"=>"ù","Ủ"=>"ủ","Ụ"=>"ụ","Ũ"=>"ũ",
            "Ư"=>"ư","Ứ"=>"ứ","Ừ"=>"ừ","Ử"=>"ử","Ự"=>"ự","Ữ"=>"ữ",
            "Ý"=>"ý","Ỳ"=>"ỳ","Ỷ"=>"ỷ","Ỵ"=>"ỵ","Ỹ"=>"ỹ",
            "Í"=>"í","Ì"=>"ì","Ỉ"=>"ỉ","Ị"=>"ị","Ĩ"=>"ĩ",
            "Đ"=>"đ"
        ]);
        foreach ($str as $key => $value) {
            # code...
            foreach ($list_key as $k => $v) {
                # code...
                if($value == $k){
                    $str = $v;
                    break;
                }
            }
        }
        return $str;
    }
}
