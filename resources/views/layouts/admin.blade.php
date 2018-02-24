  <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <title>{{ config('app.name', 'LandingPage') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(isset($logos) && is_object($logos))
    @foreach($logos as $logo)
<title>{{ $logo->name }}</title>
    
<link rel="icon" href="{{ $logo->favicons }}" type="image/png">  
                   
    @endforeach
    @endif
    <!--link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png"-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Scripts -->
    
    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/file-style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
</head>
<body>

<header id="header_wrapper">
@yield('header')
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach($error->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
</header>
@yield('content')



@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Panel</div>

                <div class="panel-body">
                <p>{{ Auth::user()->name }}</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as ADMIN!
       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


   <script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8"></script>
   <!--script>
        var editor = CKEDITOR.replace( 'editor1' );
</script-->

    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('.class').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
</body>
</html>
