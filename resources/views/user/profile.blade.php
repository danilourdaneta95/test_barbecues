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
                    <span class="art-PostHeader">Mi perfil</span>
                </h2>
                <div class="art-PostContent">
                    @if (isset($msj))
                        <div class="alert alert-success text-center">
                            {{ $msj }}
                        </div>
                    @endif
                    <form action="{{ route('ProfileSave') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ \Auth::user()->id }}">
                        <div class="panel panel-success panel-bordered">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <input type="text" name="name" class="form-control" value="{{ \Auth::user()->name }}">
                                    <label id="name-error" class="error text-danger" for="name"></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Correo:</label>
                                    <input type="text" name="email" class="form-control" value="{{ \Auth::user()->email }}">
                                    <label id="email-error" class="error text-danger" for="email"></label>
                                </div>
                                <div class="form-group">
                                    <label for="">Código Postal:</label>
                                    <input type="text" name="zipcode" class="form-control" value="{{ \Auth::user()->zipcode }}">
                                    <label id="zipcode-error" class="error text-danger" for="zipcode"></label>
                                </div>
                                <input type="submit" value="Guardar" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                        
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