<DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pham Dai No 1</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    @include('layouts.header')
    <div id="content">
         <h1 >Phạm Đại</h1>
         @yield('Content')
    </div>
    @include('layouts.footer')
</body>
</html>
</DOCTYPE>


