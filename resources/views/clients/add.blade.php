
@extends('layoouts.client')
@section('title')
{{$title}}
@endsection

@section('content')
<h1>thêm sản phẩm </h1>
<form action="{{route('post-add')}}" method="POST" id="product-form">
   
    <div class="alert alert-danger text-center msg" style="display:none;"></div>
  
        <div class="mb-3">
            <label for="">tên sản phẩm</label>
            <label type="text" class="form-control" name ="product_name" aria-placeholder="tên sản phẩm ..."value="{{old('product_name')}}"></label>
         <span style="color:red" class="error product_name_error"> </span> 
         
        </div>
        <div class="mb-3">

          <label for="">giá sản phẩm</label>
            <label type="text" class="form-control" name ="product_name" aria-placeholder="giá sản phẩm ..."value="{{old('product_price')}}"></label>
             
         <span style="color:red"class=" error product_price_error"></span> 
    
        </div>
    @enderror)
    <button type="submit"class="btn btn-primary">thêm mới</button>
</form>

@endsection

@section('css')



@endsection

@section('js')
<script>
  $(document).ready(function(){
  // console.log('ok')
  $('#product-form').on('submit',function(e){
  e.preventDefault();
  let productName = $('input[name="product_name"]').val().trim();
    let productPrice = $('input[name="product_price"]').val().trim();
    let actionUrl =$(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val();
    $('.error').text('');
    $.ajax({
      url:actionUrl,
      type:'POST',
      data:{
        product_name:productName,
        product_price:productPrice,
        _token:csrfToken
      },
        dataType:'json',
        success: function(response){
          console.log(response);
        },
        error: function(error){
         $('.msg').show();
          let responseJSON =error.responseJSON.errors;
          if(Object.keys(responseJSON).length>0){
            for (let key in responseJSON){
            $('.'+key+'_error').text(responseJSON[key](0);
          }
          
          }
          
         
        }
    });










  } );
  });
</script>


@endsection







