 @extends("admin/core/frame_admin");
 @section('title' , "Trang chủ")
 @section('content');

 <!-- Page Heading -->
<div class="container p-3 my-3 border text-dark"  class="">
    <form class="form-horizontal" action="{{route('loaigiay.store')}}" method="post" enctype="multipart/form-data">
    <fieldset>

    <!-- Form Name -->
    <legend >LOẠI GIÀY</legend>
    {{ csrf_field()}}
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name">TÊN LOẠI GIÀY</label>  
      <div class="col-md-4">
      <input id="product_name" name="loaigiay" placeholder="TÊN LOẠI GIÀY" class="form-control input-md" required="" type="text">
      <p>{{$errors->first('loaigiay')}}</p>
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name_fr">MÔ TẢ</label>  
      <div class="col-md-4">
      <input id="product_name_fr" name="mota" placeholder="MÔ TẢ" class="form-control input-md" required="" type="text">
      <p>{{$errors->first('mota')}}</p>
        
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_categorie">THỂ LOẠI</label>
      <div class="col-md-4">
        <select id="product_categorie" name="theloai" class="form-control">
          @foreach($theloais as $theloai){
          <option>{{$theloai->name}}</option>
        }
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name_fr">Ảnh đại diện</label>  
      <div class="col-md-4">
      <input id="product_name_fr" name="anh" placeholder="MÔ TẢ"  required="" type="file">
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