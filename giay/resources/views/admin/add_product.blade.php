 @extends("admin/core/frame_admin");
 @section('title' , "Trang chủ")
 @section('content');

 <!-- Page Heading -->
<div class="container p-3 my-3 border text-dark"  class="">
    <form class="form-horizontal" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
    <fieldset>

    <!-- Form Name -->
    <legend >Sản phẩm</legend>
    {{ csrf_field()}}
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name">TÊN GIÀY</label>  
      <div class="col-md-4">
      <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
      <p>{{$errors->first('name')}}</p>
        
      </div>
    </div>

    <!-- Text input-->

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_categorie">LOẠI GIÀY</label>
      <div class="col-md-4">
        <select id="product_categorie" name="loaigiay" class="form-control">
          @foreach($loaigiays as $loaigiay){
          <div>
          <option >{{$loaigiay->name}}</option>
          </div>
        }
          @endforeach
        </select>
      </div>
      <p>{{$errors->first('loaigiay')}}</p>
    </div>


    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="available_quantity">SỐ LƯỢNG</label>  
      <div class="col-md-4">
      <input id="available_quantity" name="quantity" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">
        <p>{{$errors->first('quantity')}}</p>
      </div>
    </div>

     <div class="form-group">
      <label class="col-md-4 control-label" for="available_quantity">giá</label>  
      <div class="col-md-4">
      <input id="available_quantity" name="cost" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">
        <p>{{$errors->first('cost')}}</p>
      </div>
    </div>

    <!-- Text input-->


    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_description">MÔ TẢ NGẮN</label>
      <div class="col-md-4">                     
        <textarea class="form-control" id="product_description" name="mota_ngan"></textarea>
      </div>
      <p>{{$errors->first('mota_ngan')}}</p>
    </div>

    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name_fr">MÔ TẢ DÀI</label>
      <div class="col-md-4">                     
        <textarea class="form-control" id="product_name_fr" name="mota_dai"></textarea>
      </div>
      <p>{{$errors->first('mota_dai')}}</p>
    </div>

     <!-- File Button --> 
    <div class="form-group">
      <label class="col-md-4 control-label" for="filebutton">anh san pham 1</label>
      <div class="col-md-4">
        <input id="filebutton" name="anh_1" class="input-file" type="file">
      </div>
      <p>{{$errors->first('anh_1')}}</p>
    </div>
    
    <!-- File Button --> 
    <div class="form-group">
      <label class="col-md-4 control-label" for="filebutton">anh san pham 2</label>
      <div class="col-md-4">
        <input id="filebutton" name="anh_2" class="input-file" type="file">
      </div>
      <p>{{$errors->first('anh_2')}}</p>
    </div>
    
    <!-- File Button --> 
    <div class="form-group">
      <label class="col-md-4 control-label" for="filebutton">anh san pham 3</label>
      <div class="col-md-4">
        <input id="filebutton" name="anh_3" class="input-file" type="file">
      </div>
      <p>{{$errors->first('anh_3')}}</p>
    </div>
    
    <!-- File Button --> 
    <div class="form-group">
      <label class="col-md-4 control-label" for="filebutton">anh san pham 4</label>
      <div class="col-md-4">
        <input id="filebutton" name="anh_4" class="input-file" type="file">
      </div>
      <p>{{$errors->first('anh_4')}}</p>
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