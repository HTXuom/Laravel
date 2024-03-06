
@extends('layoouts.client')
@section('title')
{{$title}}
@endsection

@section('content')
<h1>thêm sản phẩm </h1>
<form action="" method="POST">
    @if ($error->any())
     {{-- @php 
      dd($error->any());
     @endphp --}}
     <div class="alert alert-danger text-content">
        {{-- @foreach ($error->all() as $error)
        <p>{{$error}}</p>
             --}}
             {{$errorMessage}}
        @endforeach
     </div>
    @endif
        <div class="mb-3">
            <label for="">tên sản phẩm</label>
            <label type="text" class="form-control" name ="product_name" aria-placeholder="tên sản phẩm ..."value="{{old('product_name')}}"></label>
            @error ('product_name')
         <span style="color:red">{{$message}} </span> 
           @enderror
        </div>
        <div class="mb-3">

          <label for="">giá sản phẩm</label>
            <label type="text" class="form-control" name ="product_name" aria-placeholder="giá sản phẩm ..."value="{{old('product_price')}}"></label>
                @error ('product_price')
         <span style="color:red">{{$message}}</span> 
           @enderror

        </div>
    @enderror)
    <button type="submit"class="btn btn-primary">thêm mới</button>
</form>

@endsection

@section('css')



@endsection

@section('js')


@endsection







