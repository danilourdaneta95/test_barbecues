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
    <div class="col-md-12">
            
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('RegisterStore') }}" method="POST" id="form">
            {{ csrf_field() }}
            <div class="panel panel-success panel-bordered">
                <div class="panel-heading">
                    Registrar usuario
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Nombre:</label>
                        <input type="text" name="name" class="form-control">
                        <label id="name-error" class="error text-danger" for="name"></label>
                    </div>
                    <div class="form-group">
                        <label for="">Correo:</label>
                        <input type="text" name="email" class="form-control">
                        <label id="email-error" class="error text-danger" for="email"></label>
                    </div>
                    <div class="form-group">
                        <label for="">Contraseña:</label>
                        <input type="password" name="password" class="form-control">
                        <label id="password-error" class="error text-danger" for="password"></label>
                    </div>
                    <div class="form-group">
                        <label for="">Repita la Contraseña:</label>
                        <input type="password" name="password2" class="form-control">
                        <label id="password2-error" class="error text-danger" for="password2"></label>
                    </div>
                    <div class="form-group">
                        <label for="">Código Postal:</label>
                        <input type="text" name="zipcode" class="form-control">
                        <label id="zipcode-error" class="error text-danger" for="zipcode"></label>
                    </div>
                    <input type="submit" class="btn btn-success" value="Guardar">
                </div>
            </div>
        </form>
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
                        password2: 'required',
                        zipcode: 'required'
                    },
                    messages: {
                        email: {
                            required: 'El correo es requerido',
                            email: 'Formato de correo inválido'
                        },
                        name: 'El nombre es requerido',
                        password: 'La contraseña es requerida',
                        password2: 'La contraseña es requerida',
                        zipcode: 'Este campo es requerido'                        
                    }
                })
            }
</script>

@endsection