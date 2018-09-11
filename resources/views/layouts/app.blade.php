<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">


    <style type="text/css">
    @font-face {
        font-family: Droid Arabic Kufi;
        src: url('{{ asset('fonts/droidarabickufibold.ttf') }}');
        font-weight: bold;
    }
    @font-face {
        font-family: Droid Arabic Kufi;
        src: url('{{ asset('fonts/DroidArabicKufiRegular.ttf') }}');
    font-weight: normal;
    }

    * {
        font-family: Droid Arabic Kufi !important;

    }

    .delete-button {
        background: white;
        border: white;
    }
    .delete-button:hover {
        background: white !important;
        border: white;
    }

    .card-header {
        flex-direction: row-reverse;
    }
    .table {
        direction: rtl;
    }
   
</style>
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if($errors->count() > 0)  
                <ul class="list-gruop-item">
                @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger text-right">{{$error}}</li>
                    @endforeach
                    </ul><br><br><br>
                @endif
            <div class="row justify-content-center ">

            <div class="col-md-9">
                @yield('content')
            </div>  

            <div class="col-md-3">
            <div class="card ">
            <div class="card-header"><b> القائمة الرئيسية </b></div>   
            <div class="card-body">
                <aside class="menu">

                    <p class="menu-label text-right">
                      الغيابات
                    </p>
                    <ul class="menu-list">
                    <li class="text-right"><a>ادخال الغياب</a></li>
                    
                    </ul>

                    <p class="menu-label text-right">
                     السنة الدراسية الكاملة 
                    </p>
                    <ul class="menu-list">
                    <li class="text-right"><a>الغيابات</a></li>
                    <li class="text-right"><a>المراحل الدراسية</a></li>
                    <li class="text-right"><a>المواد الدارسية</a></li>
                    <li class="text-right"><a>الطلاب</a></li>
                    <li class="text-right"><a>التدريسين</a></li>
                    <li class="text-right"><a></a></li>
                    <li class="text-right"><a> </a></li>
                    <li class="text-right"><a href="{{route('setting.index')}}">الاعدادات </a></li>
                    </ul>
                    
                </aside>
            </div>
            </div>
          
        </main>
    </div>
    </div>

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>

    <script>

        @if(Session::has('success'))
        toastr.options.rtl = true;
        toastr.options.progressBar = true;
        toastr.success('{{Session::get('success')}}')    
        @endif
    </script>
</body>
</html>
