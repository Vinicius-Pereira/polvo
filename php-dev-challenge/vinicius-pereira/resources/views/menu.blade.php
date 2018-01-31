<!DOCTYPE html>
<html>
<head>
    <title>VP - CRUD</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/padrao.css') }}" rel="stylesheet">
    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <span class="navbar-brand" href="">VP-CRUD</span>
            </div>
            <ul class="nav navbar-nav">
                <li class=""><a href="{{ route('pedidos') }}">Pedidos</a></li>
                <li class=""><a href="{{ route('produtos') }}">Produtos</a></li>
                <li class=""><a href="{{ url('/') }}">Sobre</a></li>
            </ul>
        </div>
    </nav>
    @yield('menu')
</body>
</html>