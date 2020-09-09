 @extends("admin/core/frame_admin")
 @section('title' , "Trang chủ")
 @section('content')

  
    
  

 <!-- Page Heading -->

<div class="container p-3 my-3 border text-dark"  class="">
    <form class="form-horizontal" action="{{route('theloai.store')}}" method="post" enctype="multipart/form-data">
    <fieldset>

    <!-- Form Name -->
    <legend >THỂ LOẠI</legend>
    {{ csrf_field()}}
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name">TÊN THỂ LOẠI</label>  
      <div class="col-md-4">
      <input id="product_name" name="theloai" placeholder="TÊN THỂ LOẠI" class="form-control input-md" required="" type="text">
      <p>{{$errors->first('theloai')}}</p>
        
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

    <div class="form-group">
      <div class="col-md-4">
      <input  name="anh" placeholder="Ảnh"  required="" type="file">
        
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