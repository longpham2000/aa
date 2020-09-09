 @extends("admin/core/frame_admin")
 @section('title' , "Trang chủ")
 @section('content')

 <!-- Page Heading -->
 <div class="container-fluid p-4 my-4 border text-dark"  class="">
  <form class="form-horizontal" action="{{route('product.update', $datas->id_giay)}}" method="post" enctype="multipart/form-data">
    <fieldset>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      @method('PUT')
      <!-- Form Name -->
      <legend >PRODUCTS</legend>
      {{ csrf_field()}}
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_name">TÊN GIÀY</label>  
        <div class="col-md-4">
          <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text" value="{{$datas->name}}">
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
              @if($loaigiay->id_loaigiay == $datas->id_loaigiay)
              <option selected>{{$loaigiay->name}}</option>
              @else
              <option >{{$loaigiay->name}}</option>
              @endif
            </div>
          }
          @endforeach
        </select>
      </div>
      <p>{{$errors->first('loaigiay')}}</p>
    </div>

    

    <!-- Text input-->


    <div class="form-group">
      <label class="col-md-4 control-label" for="available_quantity">giá</label>  
      <div class="col-md-4">
        <input id="available_quantity" name="cost" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text" value="{{$datas->cost}}">
        <p>{{$errors->first('cost')}}</p>
      </div>
    </div>


    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_description">MÔ TẢ NGẮN</label>
      <div class="col-md-4">                     
        <textarea class="form-control" id="product_description" name="mota_ngan" >{{$datas->mota_ngan}}</textarea>
        <p>{{$errors->first('mota_ngan')}}</p>
      </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="product_name_fr">MÔ TẢ DÀI</label>
      <div class="col-md-4">                     
        <textarea class="form-control" id="product_name_fr" name="mota_dai" >{{$datas->mota_dai}}</textarea>
        <p>{{$errors->first('mota_dai')}}</p>
      </div>
    </div>

    <div class="row">
      @php
      $i = 1;
      @endphp

      @foreach($datas->anh_giay as $url)
      <div class="col-md-3">
        <div class="container p-3">
          <label>ảnh cũ</label><br>
          <img src="{{asset('storage/img/'.$url->url)}}" width="100px" height="100px"><br>
        </div>
        <div class="container p-3">
         <label>Thay ảnh khác</label><br>
         <input type="file" name="anh_{{$i++}}">
         <p>{{$errors->first("anh_".$i)}}</p>
       </div>
     </div>
     @endforeach
   </div>

   <!-- Button -->
   <div class="form-group">
    <div class="col-md-4">
      <input type="submit" name="submit" id="singlebutton" class="btn btn-primary" value="Đăng">
    </div>
  </div>

</fieldset>
</form>
</div>



@endsection