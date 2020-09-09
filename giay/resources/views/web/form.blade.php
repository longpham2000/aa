<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<div>
  <p>Mã sản phẩm : <strong>{{$id_order}}</strong></p>
  <p>Tên khách hàng: <strong>{{$customer->ho." ".$customer->ten}}</strong></p>
  <p>Địa chỉ: <strong>{{$customer->address}}</strong></p>
</div>
<table id="customers">
  <tr>
    <th>tên sản phẩm</th>
    <th>số lượng</th>
    <th>giá sản phẩm</th>
  </tr>
  @foreach($cart as $item)
  <tr>
    <td>{{$item->name}}</td>
    <td>{{$item->quantity}}</td>
    <td>{{$item->price}}</td>
  </tr>
  @endforeach
  <tr>
    <td>Tổng giá sản phẩm</td>
    <td></td>
    <td>{{Cart::getTotal()}}</td>
  </tr>
</table>

</body>
</html>
