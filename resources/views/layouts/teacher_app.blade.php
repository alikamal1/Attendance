<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.ar.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-toggle.min.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>

    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">



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
        display: block !important; 
        font-weight: bold !important;
        text-align: center !important;
    }
    .card-header.bg-dark {
        background-color: #414f5d !important;
    }
    
    .table {
        direction: rtl;
    }
    .menu-label {
        letter-spacing: 0; 
        text-align: center !important;
    }

    .dropdown-toggle {
    padding-right: 5px !important;
}

.bootstrap-select.btn-group .dropdown-toggle .filter-option {
   text-align: right !important;
}

.bootstrap-select.btn-group .dropdown-toggle .caret {
    left: 12px !important;
    right: unset !important;;
}

.select2-results__option {
    text-align: center;
}
   
</style>
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background: #414f5d" id="navdiv">
            <div class="container">
                <a class="navbar-brand" style="color: white" href="{{ url('/') }}">
                    Computer Engineering Department
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item" >
                                <a class="nav-link" href="{{ route('teacher_app.login') }}">{{ __('teacher_app.login') }}</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li> --}}
                        @else
                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white">
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

            <div class="col-md-9" id="contentdiv">
                @yield('content')
            </div>  
            @auth
        
                @endauth
                
    </div>
    </div>
            
        </main>
    </div>
    
    <script>

        @if(Session::has('success'))
        toastr.options.rtl = true;
        toastr.options.progressBar = true;
        toastr.options.positionClass = "toast-bottom-right";
        toastr.success('{{Session::get('success')}}')    
        @endif
    </script>

</script>
<footer class="container text-center" id="footerdiv">
      <p style="color:gray;">© Computer Engineering Department </p>

    </footer>
</body>
</html>
