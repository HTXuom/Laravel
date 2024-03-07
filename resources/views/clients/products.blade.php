

@extends('layoouts.client')
@section('title')
{{$title}}
@endsection

@section('sidebar')
<h3> Home Sidebar</h3>
@endsection

@section('content')
@if(section('msg'))
<div class="alert alert-success">{{section('msg')}}</div>
@endif
<h1>Sanr Phaamr</h1>
@push('scripts')
<script>
    console.log('push laanf 2');
</script>
@endsection

@section('css')

@endsection
@section('js')


@endsection