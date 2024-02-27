@extends('layoouts.client')
@section('title')
{{$title}}
@endsection

@section('sidebar')
<h3> Products Sidebar</h3>
@endsection

@section('content')
<h1>san pham</h1>
<button type='button' class='show'>Show</button>
@endsection

@section('css')

<style>
    header {
        background: red;
        color: #fff;

    }
</style>
@endsection
@section('js')
document.querySelector{'.show'}.onclik = function(){
alert('thành công');
}

@endsection