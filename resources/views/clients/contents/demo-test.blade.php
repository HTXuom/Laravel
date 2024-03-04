{{-- <i class ='fa fa-hourglass-1' aria-hidden="true"></i> --}}
<h2>demo view Unicode</h2>
@if(session('mess'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<form action="" method="POST">
    <input type="text" name="usename" placeholder="usename..." value="{{old('usename')}}">
 <button type="submit">Submit</button>
 @csrf
</form>