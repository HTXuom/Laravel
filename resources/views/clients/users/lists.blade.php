
@extends('layoouts.client')
@section('title')
{{$title}}
@endsection

@section('content')
@if(section('msg'))
<div class="alert alert-success">{{section('msg')}}</div>
@endif
<h1>{{$title}}</h1>
<a href="{{route('users.add')}}" class="btn btn-primary">Thêm người dùng </a>
</hr>

<form action="" method="get" class="mb-3">
  <div class="row">

 
    <div class="col-3"name="status">
      <select class="from-control" >
        <option value="0">Tất cả  nhóm</option>
        @if(!empty(getAllGroups()))
         @foreach(getAllGroups() as $item)
         <option value="{{$item->id}}"{{request()
        ->group_id==$item->id?'selected':false}}>
        {{$item->name}}</option>
         @endforeach

      </select>
    </div>

     <div class="col-3" name="group">
      <select class="from-control" >
        <option value="0">Tất cả trạng thái </option>
        <option value="active"{{request()->status=='active'?'selected':false}}>
          Kích hoạt
        </option>
         <option value="inactive"{{request()->status=='inactive'?'selected':false}}> chưa
          Kích hoạt
        </option>
      </select>
    </div>

    <div class="clo-4">
      <input type="search" name="keywords" class="from-control" placeholder="Từ khóa tìm kiêm s..." value="{{request()->keywords}}">
    </div>

     <div class="col-2">
      <button type="search" class="form-control" aria-placeholder="Từ khóa tìm kiếm..."></button>
     </div>
  </div>
</form>

<table class="table table-bordered">
  <thead>
    <tr>
        <th with="5%">
            STT
        </th>
        <th>Tên</th>
        <th>Email</th>
        <th>Nhóm</th>
        <th>TRạng thái </th>
        <th with="15%">Thời gian</th>
        <th with="5%"> Sữa</th>
        <th with="5%"> Xóa</th>
    </tr>
  </thead>
  <tbody>
    @if (!@empty($usersList))
    @foreach($usersList as $key=>$item)
        
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$item->fullName}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->create_at}}</td>
        <td>{{$item->group_name}}</td>
        <td> {!!$item->status==0?'<button class=" btn-btn-danger btn-sm"> Chưa kích hoạt</button>':'<button class=" btn-btn-danger btn-sm"> kích hoạt</button>'!!}</td>
        <td>{{$item->create_at}}</td>

        <td>
            <a href="{{route('users.edit',['id'=>$item->id])}}" class="btn btn-warning btn-sm"> sữa</a>
        </td>
        <td>
            <a  onclick="return confirm('bạn có chắc chãn muốn xóa?')" href="{{route('users.delete',['id'=>$item ->id])}}" class="btn btn-danger btn-sm">xóa</a>
        </td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="4">không có người dùng</td>
    </tr>
    @endif
  </tbody>
</table>
<div class="d-flex justify-content-end">
  {{$usersList->Links()}}
</div>

@endsection