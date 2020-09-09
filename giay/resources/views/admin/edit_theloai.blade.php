 @extends("admin/core/frame_admin")
 @section('title' , "Trang chủ")
 @section('content')

  
    
  

 <!-- Page Heading -->
 
<div class="container p-3 my-3 border text-dark"  class="">
    <form class="form-horizontal" action="{{route('theloai.update', $data->id_giay)}}" method="post" enctype="multipart/form-data">
      @method('PUT')
    <fieldset>

    <!-- Form Name -->
    <legend >THỂ LOẠI</legend>
    {{ csrf_field()}}
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name">TÊN THỂ LOẠI</label>  
      <div class="col-md-4">
      <input id="product_name" name="name" placeholder="TÊN THỂ LOẠI" class="form-control input-md" required="" type="text" value="{{$data->name}}">
      <p>{{$errors->first('theloai')}}</p>
        
      </div>
    </div>

    

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name_fr">MÔ TẢ</label>  
      <div class="col-md-4">
      <input id="product_name_fr" name="mota" placeholder="MÔ TẢ" class="form-control input-md" required="" type="text" value="{{$data->mota}}">
      <p>{{$errors->first('mota')}}</p>
        
      </div>
    </div>
    <div class="form-group">
      <label>Ảnh cũ</label><br>
      <img src="{{asset('storage/img/'.$data->anh_url)}}" width="100px" height="100px">
    </div>
    <div class="form-group">
      <div class="col-md-4">
        <label>Chọn ảnh mới</label><br>
      <input  name="anh" placeholder="Ảnh"   type="file">
        <p>{{$errors->first('anh')}}</p>
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <div class="col-md-4">
        <input type="submit" name="submit" id="singlebutton" class="btn btn-primary" value="gửi">
      </div>
      </div>

    </fieldset>
    </form>
</div>



@endsection