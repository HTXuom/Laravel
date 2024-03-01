@extends('layoouts.client')
@section('title')
{{$title}}
@endsection

@section('sidebar')
<h3> Home Sidebar</h3>
@endsection

@section('content')
<h1>Trang chủ</h1>
@datetime('2021-12-15:00:00:30')
@include('clients.contents.slide')
@include('clients.contents.about')
<button type='button' class='show'>Show</button>
@endsection

@section('css')

@endsection
@section('js')


@endsection







