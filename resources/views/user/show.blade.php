@extends('layout')

@section('content')
    
<div class="art-sidebar1">
    <div class="art-Block">
        <div class="art-Block-body">
            <div class="art-BlockHeader">
                <div class="l"></div>
                <div class="r"></div>
                <div class="art-header-tag-icon">
                    <div class="t">Historial</div>
                </div>
            </div>
            <div class="art-BlockContent">
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
                    <b>Barbacoas que he rentado</b><br/>
                    <ul>
                        @if(\Auth::user()->barbecues->count() > 0)
                            
                            @foreach(\Auth::user()->barbecues as $barbecue)
                                @if ($barbecue->pivot->taken)
                                    <li><a href="{{ route('BarbecueShow', $barbecue->id) }}">{{ $barbecue->model }}</a></li>
                                @endif
                            @endforeach
                        @else
                            <p>Ninguna</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="art-Block">
        <div class="art-Block-body">
            <div class="art-BlockHeader">
                <div class="l"></div>
                <div class="r"></div>
                <div class="art-header-tag-icon">
                    <div class="t">Perfil</div>
                </div>
            </div>
            <div class="art-BlockContent">
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
                            <img src="../images/profile.png" alt="image" style="margin: 0 auto;display:block;width:95%" />
                        <br />
                        <b>{{ \Auth::user()->name }}</b><br />
                        Email: <a href="mailto:info@company.com">{{ \Auth::user()->email }}</a><br />
                        Zip Code: {{ \Auth::user()->zipcode }}<br />
                        <br/>
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
                    <span class="art-PostHeader">Usuario</span>
                </h2>
                <div class="art-PostContent">
                <img class="art-article" src="../images/profile.png" alt="an image" style="float:left;max-width:250px;" />
                    <p>
                        <div class="panel-body">
                            <div class="form-inline">
                                <label for="">Nombre: </label>
                                <small>{{ $user->name }}</small>
                            </div>
                            <div class="form-inline">
                                <label for="">Corrreo: </label>
                                <small>{{ $user->email }}</small>
                            </div>
                            <div class="form-inline">
                                <label for="">Código postal: </label>
                                <small>{{ $user->zipcode }}</small>
                            </div>
                        </div>
                    </p>
                    
                        
                </div>
                <div class="cleared"></div>
            </div>
        </div>
    </div>
</div>
<script>
    var $form = $('#form');
            if ($form.length) {
                $form.validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        name: 'required',
                        password: 'required',
                        zipcode: 'required'
                    },
                    messages: {
                        email: {
                            required: 'El correo es requerido',
                            email: 'Formato de correo inválido'
                        },
                        name: 'El nombre es requerido',
                        password: 'La contraseña es requerida',
                        zipcode: 'Este campo es requerido'                        
                    }
                })
            }
</script>
@endsection