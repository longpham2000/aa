 @extends("admin/core/frame_admin")
 @section('title' , "Trang chủ")
 @section('content')
<?php $i=1?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">{{$table_name}}</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      @isset($form)
                        @foreach($form as $f)
                          <th>{{$f}}</th>
                        @endforeach
                      @endisset
                      <TH>CHỨC NĂNG</TH>
                    </tr>
                  </thead>
                  <tfoot>
                     <tr>
                      <th>STT</th>
                      @isset($form)
                        @foreach($form as $f)
                          <th>{{$f}}</th>
                        @endforeach
                      @endisset
                      <TH>CHỨC NĂNG</TH>
                    </tr>
                  </tfoot>
                  <tbody>
                    @isset($data)
                    @foreach($data as $dulieu)
                     <tr>
                      <td>{{$i++}}</td>

                      @isset($dulieu->anh)
                      <td> <img src="{{asset('storage/img/'.$dulieu->anh)}}" width="70px" height="60px"></td>
                      @endisset

                      @isset($dulieu->name1)
                      <td>{{$dulieu->name1}}</td>
                      @endisset

                      @isset($dulieu->khongdau)
                      <td>{{$dulieu->khongdau}}</td>
                      @endisset

                      @isset($dulieu->cost)
                      <td>{{$dulieu->cost}}</td>
                      @endisset

                      @isset($dulieu->name2)
                      <td>{{$dulieu->name2}}</td>
                      @endisset

                      @isset($dulieu->name3)
                      <td>{{$dulieu->name3}}</td>
                      @endisset

                      @isset($dulieu->mota)
                      <td>{{$dulieu->mota}}</td>
                      @endisset

                      <td>
                        
                        <a href="{{route($table_khongdau.'.edit', $dulieu->id)}}" class="btn btn-primary">sửa</a>
                        <form action="{{route($table_khongdau.'.destroy', $dulieu->id)}}" method="post">@method('DELETE')<input type="submit" name="buttom" value="Xóa" class="btn btn-danger">@csrf</form>
                        
                      </td>
                    </tr>
                    @endforeach
                    @endisset
                   
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        @endsection