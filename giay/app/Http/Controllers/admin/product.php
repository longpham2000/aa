<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Storage;

use App\anh_giay;
use App\giay;
use App\loaigiay;
use App\product as sp;
use App\theloai;
use App\User;


class product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaigiay = loaigiay::join('theloai' , 'theloai.id_theloai', '=' ,'loaigiay.id_theloai'  )->select('loaigiay.*' ,  'theloai.name as theloainame')->get();
        return view('admin.add_product' , ['loaigiays' => $loaigiay]);
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
            'name'=> 'required|unique:giay,name|max:50',
            'loaigiay'=>'required',
            'cost'=> 'required|Numeric|max:50000000',
            'quantity'=>'required|Numeric|max:99999',
            'mota_ngan'=>'required|max:255',
            'mota_dai'=>'required|',

            'anh_1'=>'required|image|mimes:jpeg,jpg,png|max:2024',
            'anh_2'=>'required|image|mimes:jpeg,jpg,png|max:2024',
            'anh_3'=>'image|mimes:jpeg,jpg,png|max:2024',
            'anh_4'=>'image|mimes:jpeg,jpg,png|max:2024'
        ]);

        $id_product = rand(100000000, 999999999);
        $id_loaigiay = loaigiay::where('name', $request->loaigiay)->select('id_loaigiay')->first()->id_loaigiay;

        $path1 = $request->file('anh_1')->store('public/img');
        $a = anh_giay::insert([
            'url'=>preg_replace('/(public\/img\/)/', "", $path1),
            'id_giay'=>$id_product
        ]);
        
        $path2 = $request->file('anh_2')->store('public/img');
        anh_giay::insert([
            'url'=>preg_replace('/(public\/img\/)/', "", $path2),
            'id_giay'=>$id_product
        ]);

        if($request->has('anh_3')){
            $path3 = $request->file('anh_3')->store('public/img');
            anh_giay::insert([
            'url'=>preg_replace('/(public\/img\/)/', "", $path3),
            'id_giay'=>$id_product
        ]);
        }
        
        if($request->has('anh_4')){
           $path4 = $request->file('anh_4')->store('public/img');
            anh_giay::insert([
            'url'=>preg_replace('/(public\/img\/)/', "", $path4),
            'id_giay'=>$id_product
        ]);
        }
        

        

        $tb = sp::insert([
            'id_giay'=>$id_product,
            'name'=>$request->name,
            'id_loaigiay'=>$id_loaigiay,
            'cost'=>$request->cost,
            'quantity'=>$request->quantity,
            'mota_ngan'=>$request->mota_ngan,
            'mota_dai'=>$request->mota_dai,
        ]);

        if($tb){
            return redirect()->route('admin.tables', ['data'=>'product'])->with(['message'=>'tạo sản phẩm thành công', 'class'=>'alert alert-success']);
        }
        
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
        $data= giay::find($id);
        $loaigiay= loaigiay::all();
        return view('admin.edit_product', ['datas'=> $data, 'loaigiays'=> $loaigiay]);

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
        // DB::table('users')
        //         ->where('id', 1)
        //         ->update(['votes' => 1]);
        // }
        $request->validate([
            'name'=> "required|unique:giay,name,$id,id_giay|max:50",
            'loaigiay'=>'required',
            'cost'=> 'required|Numeric|max:50000000',
            'mota_ngan'=>'required',
            'mota_dai'=>'required',

            'anh_1'=>'image|mimes:jpeg,jpg,png|max:2024',
            'anh_2'=>'image|mimes:jpeg,jpg,png|max:2024',
            'anh_3'=>'image|mimes:jpeg,jpg,png|max:2024',
            'anh_4'=>'image|mimes:jpeg,jpg,png|max:2024'
        ]);
        $product = giay::findOrFail($id);

        $product->name = $request->name;
        $product->id_loaigiay = loaigiay::where('name', $request->loaigiay)->first()->id_loaigiay;
        $product->cost = $request->cost;
        $product->mota_ngan = $request->mota_ngan;
        $product->mota_dai = $request->mota_dai;
        $product->save();

         if($request->has('anh_1')){
           $path1 = $request->file('anh_1')->store('public/img');
           $anh = giay::findOrFail($id)->anh_giay[0];
           $old_anh = $anh->url; 
           Storage::delete('public/img/'.$old_anh);
           $anh->url = preg_replace("/(public\/img\/)/", '', $path1);
           $anh->save();
        }

        if($request->has('anh_2')){
           $path2 = $request->file('anh_2')->store('public/img');
           $anh = giay::findOrFail($id)->anh_giay[1];
           $old_anh2 = $anh->url; 
           Storage::delete('public/img/'.$old_anh2);
           $anh->url = preg_replace("/(public\/img\/)/", '', $path2);
           $anh->save();
        }

        if($request->has('anh_3')){
           $path3 = $request->file('anh_3')->store('public/img');
           $anh = giay::findOrFail($id)->anh_giay[2];
           $old_anh3 = $anh->url; 
           Storage::delete('public/img/'.$old_anh3);
           $anh->url = preg_replace("/(public\/img\/)/", '', $path3);
           $anh->save();
        }

        if($request->has('anh_4')){
           $path4 = $request->file('anh_4')->store('public/img');
           $anh = giay::findOrFail($id)->anh_giay[3];
           $old_anh4 = $anh->url; 
           Storage::delete('public/img/'.$old_anh4);
           $anh->url = preg_replace("/(public\/img\/)/", '', $path4);
           $anh->save();
        }
        
        return redirect()->route('admin.tables', 'product')->with(['message'=> 'Thay đổi thành công', 'class'=> 'alert alert-success']);
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
        // sp::delete($id);
        // //hoặc
        // DB::table('users')->where('votes', '>', 100)->delete();
        //  
      
            $a = sp::destroy($id);
            $anh = anh_giay::where('id_giay', $id)->get();
            foreach ($anh as $key) {
                # code...
                Storage::delete('public/img/'.$key->url);
            }
        
        
        return redirect()->route('admin.tables', 'product')->with(['message'=> 'Đã xóa thành công', 'class'=> 'alert alert-success']);
     }


     public function upimg($file , $id_giay , $product_khongdau)
     {
            $name = $product_khongdau.rand(10000 , 99999).'.'.$file->extension();
            $file->storeAs('public/img/', $name);
            anh_giay::insert(
                 ['url' => $name, 'id_giay' => $id_giay]
             );
     }
}
