<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <table class="table ">
          <thead>
               <tr>
                    <th class="serial">#</th>
                     <th>Mã</th>
                     <th>Tên </th>
                      <th>Mật Khẩu</th>
                </tr>
              </thead>
               <tbody>
               <?php $i=1?>               
                   @foreach($postdata as $data)
                        <tr>
                            <td class="serial">{{$i}}</td>
                            <td>{{$data->ma}}</td>
                            <td>{{$data->ten}}</td>
                            <td>{{$data->matkhau}}</td>
                          </tr>
                 <?php $i++ ?>
                      @endforeach                                    
                   </tbody>
   </table>
</body>
</html>