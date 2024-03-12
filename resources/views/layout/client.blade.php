<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')-Unicode</title>
    @yield('css')
    
</head>
<body>
    <head>
        <h1> Header</h1>
    </head>
    <aside>
        @section('sidebar')
           @include('clients.blocks.sidebar')
           @show
    </aside>
    <div class="content">
        @yield('content')


    </div>
    <footer>
        <h1> Footer</h1>
    </footer>
    <script type="text/javascript">

    </script>
        
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        @yield ('js')
        @stack('scripts')
</body>
</html>