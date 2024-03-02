@extends('layoouts.client')
@section('title')
{{$title}}
@endsection

@section('sidebar')
<h3> Home Sidebar</h3>
@endsection

@section('content')
<h1>Trang chủ</h1>
@include('clients.contents.slide')
@include('clients.contents.about')

@env('production')
<p>Moi trường production </p>
@elseenv('text')
<p> Không phải môi trường dev</p>
@else 
<p>Môi trường text</p>
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


@endsection







