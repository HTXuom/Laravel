@extends('layoouts.client')
@section('title')
{{$title}}
@endsection

@section('sidebar')
<h3> Home Sidebar</h3>
@endsection

@section('content')
@if(section('msg'))
<div class="alert alert-info">
    {{section('msg')}}
</div>
<h1>Trang chủ</h1>
@include('clients.contents.slide')
@include('clients.contents.about')

@env('production')
<p>Moi trường production </p>
@elseenv('text')
<p> Không phải môi trường dev</p>
@else 
<p>Môi trường text</p>
{{-- <x-package-alerrt/>
<x-inputs-Button/> --}}
<x-alerrt type="info" :content ="$message" data-icon="youtube"/>
<img src="" alt="">
 
<p> <a href="{{route('download-image').'?image'.public_path('stogare/THM_zing.jpeg')}}" class="btn btn-primary">Download ảnh</a></p>

<p> <a href="{{route('download-image').'?image'.public_path('stogare/THM_zing.jpeg')}}" class="btn btn-primary">Download ảnh</a></p>


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







