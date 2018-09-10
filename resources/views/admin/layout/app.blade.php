<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' } </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{url('css/custom/core-style.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{url('style.css')}}"/>
        
        <title>Aviso Wellness</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        @yield('header')
    </head>
    <body>
    <div id="app">
        <!-- ##### Main Content Wrapper Start ##### -->
        <div class="main-content-wrapper d-flex clearfix"> 
            <admin-navbar></admin-navbar>
            @yield('body')
        </div>
        @yield('news')
        <!-- ##### Main Content Wrapper End ##### -->
        @yield('footer')
    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script src = "{{url('js/jquery/jquery-2.2.4.min.js')}}" type="text/javascript" ></script>
        <!-- Popper js -->
        <script src = "{{url('js/popper.min.js')}}" type="text/javascript" ></script>
        <!-- Bootstrap js -->
        <script src = "{{url('js/bootstrap.min.js')}}" type="text/javascript" ></script>
        <!-- Plugins js -->
        <script src = "{{url('js/plugins.js')}}" type="text/javascript" ></script>
        <!-- Active js -->
        <script src = "{{url('js/active.js')}}" type="text/javascript" ></script>

    </body>
</html>
