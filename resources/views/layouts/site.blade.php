<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('app.name', 'LandingPage') }}</title>

        
@if(isset($logos) && is_object($logos))
@foreach($logos as $logo)
        
       
<!--title>{{-- $logo->name --}}</title-->
    
<link rel="icon" href="{{ 'assets/img/'.$logo->images }}" type="image/png">  
                   
    @endforeach
    @endif
<!--link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png"--> 
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"> 
<link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css"> 
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css">

<!--script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script-->
 
<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

 

    </head>
    <body>
        <div class="flex-center position-ref full-height">



       
            @if (Route::has('login'))
                <div class="top-right links">
                    <ul class="social_links">
                    @auth
                        
                        <li class="twitter animated bounceIn wow delay-02s"><a href="https://hangouts.google.com/group/sfBHtAbl4gOhltXH2" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li class="twitter animated bounceIn wow delay-02s"><a href="https://join.skype.com/eouNXEjbdzvC"><i class="fa fa-skype" target="_blank"></i></a></li>

                        <li class="pinterest animated bounceIn wow delay-01s"><a href="{{ url('/admin') }} "><i class="fa fa-sign-in " style="color:green"></i></a></li>
                        
                        <li class="pinterest animated bounceIn wow delay-02s">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out " style="color:red"></i>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                  
                    @if(isset($socials) && is_object($socials))
                    @foreach($socials as $social)             
                                    
                        <li class="gplus animated bounceIn wow delay-02s"><a href="{{ $social->link }}" target="_blank"><i class="fa {{$social->callBack}}"></i></a></li>

                        
                    @endforeach
                    @endif

                    @else
                        
                        <li class="twitter animated bounceIn wow delay-02s"><a href="https://hangouts.google.com/group/sfBHtAbl4gOhltXH2" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li class="twitter animated bounceIn wow delay-02s"><a href="https://join.skype.com/eouNXEjbdzvC"><i class="fa fa-skype" target="_blank"></i></a></li>
                        <li class="pinterest animated bounceIn wow delay-01s"><a href=" {{ route('login') }} "><i class="fa fa-sign-in " style="color:green"></i></a></li>
                        <li class="twitter animated bounceIn wow delay-02s"><a href="{{ route('register') }} "><i class="far fa-registerd" ></i></a></li>

                    @if(isset($socials) && is_object($socials))
                    @foreach($socials as $social)                         
                    

                        <li class="gplus animated bounceIn wow delay-02s"><a href="{{ $social->link }}" target="_blank"><i class="fa {{$social->callBack}}"></i></a></li>
                        
                   @endforeach
                    @endif
                    </ul>
                    
                    @endauth
                </div>

            @endif

<div class="top-left links">
<div class="logo">
        
@if(isset($logos) && is_object($logos))
@foreach($logos as $logo)
        
          <a href="{{ url ('/') }}">{!! Html::image('assets/img/'.$logo->images) !!}</a>
          
@endforeach
@endif
</div>
</div>
        <!--Header_section-->
<header id="header_wrapper">
  @yield('header')

</header>
  
  @yield('content')


<script src="{{ asset('/vendor/call-request/js/callrequest.js') }}"></script>.
    <link href="{{ asset('/vendor/call-request/css/callrequest.css') }}" rel='stylesheet' type='text/css'>
     
<script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{
 asset('assets/js/jquery-scrolltofixed.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.nav.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.isotope.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/wow.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
    </body>
</html>
