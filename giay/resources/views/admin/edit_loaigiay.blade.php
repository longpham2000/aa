 @extends("admin/core/frame_admin")
 @section('title' , "Trang chủ")
 @section('content')

 <!-- Page Heading -->
<div class="container p-3 my-3 border text-dark"  class="">
    <form class="form-horizontal" action="{{route('loaigiay.update',$data[0]->id_loaigiay)}}" method="post" enctype="multipart/form-data">
    <fieldset>
    @method('PUT')
    <!-- Form Name -->
    <legend >LOẠI GIÀY</legend>
    {{ csrf_field()}}
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name">TÊN LOẠI GIÀY</label>  
      <div class="col-md-4">
      <input id="product_name" name="loaigiay" placeholder="TÊN LOẠI GIÀY" class="form-control input-md" required="" type="text" value="{{$data[0]->name}}">
      <p>{{$errors->first('loaigiay')}}</p>
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name_fr">MÔ TẢ</label>  
      <div class="col-md-4">
      <input id="product_name_fr" name="mota" placeholder="MÔ TẢ" class="form-control input-md" required="" type="text" value="{{$data[0]->mota}}">
      <p>{{$errors->first('mota')}}</p>
        
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_categorie">THỂ LOẠI</label>
      <div class="col-md-4">
        <select id="product_categorie" name="theloai" class="form-control">
          @foreach($theloai as $tl){
          @if($tl->name == $data[0]->theloai_name)
         	 <option selected>{{$tl->name}}</option>
          @else
         	 <option>{{$tl->name}}</option>
          @endif
        }
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group">
    	<label>Ảnh cũ</label><br>
      <img src="{{asset('storage/img/'.$data[0]->anh_url)}}" width="70px" >
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name">Thay ảnh mới</label>  
      <div class="col-md-4">
      <input id="product_name" name="anh" placeholder="TÊN LOẠI GIÀY"  type="file" value="{{$data[0]->name}}">
      <p>{{$errors->first('anh')}}</p>
        
      </div>
    </div>
    
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton">đăng</label>
      <div class="col-md-4">
        <input type="submit" name="submit" id="singlebutton" class="btn btn-primary">gửi</input>
      </div>
      </div>

    </fieldset>
    </form>
</div>



@endsection