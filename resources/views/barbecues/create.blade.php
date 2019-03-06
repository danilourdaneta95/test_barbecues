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
                                <span class="art-PostHeader">Barbacoas</span>
                            </h2>
                            <div class="art-PostContent">
                                
                                <form action="{{ route('BarbecueStore') }}" method="POST" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                     <div class="panel panel-success panel-bordered">
                                        <div class="panel-heading">
                                            Nueva
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label for="">Modelo:</label>
                                                <input type="text" name="model" class="form-control">
                                                <label id="model-error" class="error text-danger" for="model"></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Descripcion:</label>
                                                <input type="text" name="description" class="form-control">
                                                <label id="description-error" class="error text-danger" for="description"></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Foto:</label>
                                                <input type="file" name="picture">
                                                <label id="picture-error" class="error text-danger" for="picture"></label>
                                            </div>
                                            <input type="submit" value="Guardar" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script>
    var $form = $('#form');
            if ($form.length) {
                $form.validate({
                    rules: {
                        model: 'required',
                        description: 'required',
                        picture: 'required'
                    },
                    messages: {
                        name: 'El Modelo es requerido',
                        description: 'La descripción es requerida',
                        picture: 'Este campo es requerido'                        
                    }
                })
            }
</script>
@endsection