<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\anh_giay;
use App\giay;
use App\loaigiay;
use App\product;
use App\theloai as tl;
use App\User;

class theloai extends Controller
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
        return view('admin.add_theloai');
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
            'theloai'=> 'required|unique:theloai,name|max:50',
            'mota'=> 'required|max:255'
        ]);

       $khongdau = $this->convert_vi_to_en($request->theloai);
            tl::insert(
                [
                    'name' => $request->input('theloai'),
                    'mota' => $request->input('mota'),
                    'name_khongdau'=> $khongdau,
                    'anh_url'=> preg_replace("/(public\/img\/)/", "", $request->file('anh')->store('public/img'))
                    ]
            );
            return redirect()->route('theloai.create')->with(['message'=> 'Đã thêm thể loại: '.$request->theloai, 'class'=> 'alert alert-success']);
        
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
        $data = tl::findOrFail($id);
        return view('admin.edit_theloai', ['data'=> $data]);
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
            'name'=> "required|unique:theloai,name,$id,id_theloai|max:50",
            'anh'=> 'image|mimes:jpeg,png,jpg|max:2024'
        ]);
        $khongdau= $this->convert_vi_to_en($request->name);
        tl::where('id_theloai', $id)->update([
            'name'=>$request->name,
            'mota'=>$request->mota,
            'name_khongdau'=>$khongdau
        ]);

        if($request->has('anh')){
            // khởi tạo
            $theloai = tl::findOrFail($id);
            $path = $request->file('anh')->store('public/img');
            // xóa ảnh 
            $oldpath = $theloai->anh_url;
            Storage::delete("public/img/".$oldpath);
            // UPDATE ảnh
            $theloai->anh_url = preg_replace("/(public\/img\/)/", '', $path);
            $theloai->save();
        }
        return redirect()->route('admin.tables', ['data'=>'theloai'])->with(['message'=>'update thành công', 'class'=>'alert alert-success']) ;
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

        $a = tl::destroy($id);
        return redirect()->route('admin.tables', ["data"=> 'theloai']);
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
}
