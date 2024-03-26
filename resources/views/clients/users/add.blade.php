
@extends('layoouts.client')
@section('title')
{{$title}}
@endsection

@section('content')
@if(section('msg'))
<div class="alert alert-success">{{section('msg')}}</div>
@endif
@if ($error->any())
<div class="alert-alert-danger">Dữ liệu nhập không hợp lệ. Vui lòng kiểm trea lại </div>
    
@endif
<h1>{{$title}}</h1>

<form action="" method="POST">

    <div class="mb-3">
        <label for="">Họ và Tên</label>
        <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" value="{{old('fullname')}}">
        @error('fullname')
        <span style="color:red;"> {{($message)}}</span>
            
        @enderror
    </div>
    <div class="mb-3">
         <label for=""> Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email" value="{{('email')}}">
          @error('email')
        <span style="color:red;"> {{($message)}}</span>
    </div>

    <div class="mb-3">
          <label for="">Nhóm</label>
          <select name="group_id"  class="form-control" id="">
            <option value="0"> chọn nhóm</option>
            @if(!empty(alllGroups()))
               @foreach ($allGroups as $item)
               <option value="{{$item->id}}" {{old('group_id')==$item->id?'selected':false}}>{{$item->name}}</option>
               @endforeach
           @endif  
          </select>
      
          @error('group_id')
        <span style="color:red;"> {{($message)}}</span>
    </div>

    <div class="mb-3">
            <label for="">Trạng Thái </label>
            <select name="status"  class="form-control" id="">
                <option value="0" {{old('status')==0?'selected':false}}>  chưa kích hoạt </option>
                <option value="0"{{old('status')==1?'selected':false}}>  kích hoạt </option>
                
            </select>
        
          
        </div>





        <button type="submit" class="btn btn-primary"></button>
        <a href="{{route('users.index')}}" class="btn btn-warning">Quay lại</a>
   
    @csrf
</form>

@endsection