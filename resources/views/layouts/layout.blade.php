<html lang="pt-br">
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
</head>
<body>
<div class="row">
    <div class="container">
        <br>
        <h1 class="">Laravel: Formulários e Validações</h1>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{Session::get('message')}}
            </div>
        @endif
        @yield('content')
    </div>
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>