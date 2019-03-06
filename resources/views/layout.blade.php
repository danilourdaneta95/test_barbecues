<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Designed by CompanyName
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>Your Company Name </title>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
</head>
<body>
    <div id="art-page-background-gradient"></div>
    <div id="art-main">
        <div class="art-Sheet">
            <div class="art-Sheet-tl"></div>
            <div class="art-Sheet-tr"></div>
            <div class="art-Sheet-bl"></div>
            <div class="art-Sheet-br"></div>
            <div class="art-Sheet-tc"></div>                                                                                                                                                                                                                                                                                                                                                                                                                                                 <div class="art-Sheet-bc">Best <a href="http://www.flashmint.com/">flash websites</a> that has animation and sound.</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                 <div class="art-Sheet-bc">Award winning <a href="http://www.flashmint.com/">flash websites</a> that has animation and sound.</div>
            
            <div class="art-Sheet-cl"></div>
            <div class="art-Sheet-cr"></div>
            <div class="art-Sheet-cc"></div>
            <div class="art-Sheet-body">
                <div class="art-Header">
                    <div style="text-align:right;padding:5px;">
                        @if(\Auth::check())
                            <a href="{{ route('Profile') }}" style="color:white;font-size:14px;">{{ \Auth::user()->name }}</a>
                            <span> | </span>
                            <a href="{{ route('logout') }}" style="color:white;font-size:14px;">Logout</a>
                        @endif
                    </div>
                    <div class="art-Header-png"></div>
                    <div class="art-Header-jpeg"></div>
                    <div class="art-Logo">
                        <h1 id="name-text" class="art-Logo-name"><a href="#">Barbacoes Rent</a></h1>
                        <div id="slogan-text" class="art-Logo-text">Encuentra tus barbacoas favoritas para rentarlas</div>
                    </div>
                </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
                    
                        @if(\Auth::check())
                            <li><a href="{{ route('Home') }}"><span class="l"></span><span class="r"></span><span class="t">Inicio</span></a></li>
                            <li><a href="{{ route('Barbecues') }}"><span class="l"></span><span class="r"></span><span class="t">Mis barbacoas</span></a></li>
                            <li><a href="{{ route('Profile') }}"><span class="l"></span><span class="r"></span><span class="t">Mi Perfil</span></a></li>
                        @else
                            <li><a href="/"><span class="l"></span><span class="r"></span><span class="t">Inicio</span></a></li>
                        @endif
                    </ul>
                </div>
                <div class="art-contentLayout">
                @yield('content')
                </div>
                <div class="cleared"></div><div class="art-Footer">
                    <div class="art-Footer-inner">
                        <div class="art-Footer-text">
                            @if(\Auth::check())
                                <p><a href="{{ route('Home') }}">Inicio</a> | <a href="{{ route('Barbecues') }}">Mis barbacoas</a> | <a href="{{ route('Profile') }}">Mi Perfil</a></p>
                            @else
                                <p><a href="/">Inicio</a><br /></p>
                            @endif
                                Copyright &copy; 2019. Todos los derechos reservados.
                        </div>
                    </div>
                    <div class="art-Footer-background"></div>
                </div>
            </div>
        </div>
        <div class="cleared"></div>
   </div>
    
<div style="text-align: center; font-size: 0.75em;">Creado por Danilo Urdaneta</div></body>
</html>
