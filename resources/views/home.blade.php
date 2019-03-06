@extends('layout')

@section('content')
    
<div class="art-sidebar1">
                        <div class="art-Block">
                            <div class="art-Block-body">
                                <div class="art-BlockHeader">
                                    <div class="l"></div>
                                    <div class="r"></div>
                                    <div class="art-header-tag-icon">
                                        <div class="t">Iniciar Sesión</div>
                                    </div>
                                </div><div class="art-BlockContent">
                                    <div class="art-BlockContent-tl"></div>
                                    <div class="art-BlockContent-tr"></div>
                                    <div class="art-BlockContent-bl"></div>
                                    <div class="art-BlockContent-br"></div>
                                    <div class="art-BlockContent-tc"></div>
                                    <div class="art-BlockContent-bc"></div>
                                    <div class="art-BlockContent-cl"></div>
                                    <div class="art-BlockContent-cr"></div>
                                    <div class="art-BlockContent-cc"></div>
                                    <div class="art-BlockContent-body">
                                    <div>
                                        <form action="{{ route('login') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="text" value="" name="email" id="s" style="width: 95%;" placeholder="Correo" /><br><br>
                                            <input type="password" value="" name="password" style="width: 95%;" placeholder="Contraseña" />
                                            <span class="art-button-wrapper">
                                        	    <span class="l"> </span>
                                        	    <span class="r"> </span>
                                                <input class="art-button" type="submit" name="login" value="Aceptar"/>
                                            </span>
                                            <div class="col-md-6 pull-right text-right">
                                                <a href="{{ route('Register') }}">Registrarse</a>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="art-content">
                        <div class="art-Post">
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                            <h2 class="art-PostHeaderIcon-wrapper">
                            </h2>
                            <div class="art-PostContent">
                                
                                <img class="art-article" src="images/portada.jpg" alt="image" style="float: left;" />
                                    
                            </div>
                            <div class="cleared"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection