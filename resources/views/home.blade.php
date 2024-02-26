<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>unicode-Học lập trình web</title>
</head>

<body>

    <head>
        <h1>Head-unicode</h1>
        <h2>{{$title}}</h2>
    </head>
    <main>
        <h1>Nội dung-unicode </h1>
      h2>
    </main>

    <head>
        <h1>footer-unicode</h1>
    </head>

</body>

</html> -->
<h1>Trang chủ Unicode</h1>
<h2>{{!empty(request()->keyword)?request()->keyword:'không có gì'}}</h2>
<div class=" container">
    {!! !empty($content)?$content:fale!!}

</div>
<hr>
@for ($i =1;$i<=10; $i++) <p> phần tử thứ: {{$i}}</p>
    @if ($i==5)
    @break
    @endfor