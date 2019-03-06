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
                                    
                                    @foreach(\Auth::user()->barbecues as $item)
                                        @if ($item->pivot->taken)
                                            <li><a href="{{ route('BarbecueShow', $item->id) }}">{{ $item->model }}</a></li>
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

                                
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="art-PostContent">
                            <h2>{{ $barbecue->model }}</h2> 
                            <img class="art-article" src="../images/pictures/{{ $barbecue->picture }}" alt="" style="float: left;max-width:250px;" />
                            <br>
                            <p>{{ $barbecue->description }}</p>
                            @if ($barbecue->id_user != \Auth::user()->id)
                                <p><label for="">Arrendador: </label> <a href="{{ route('UserShow', $barbecue->userCreated->id) }}">{{ $barbecue->userCreated->name }}</a></p>
                                <p>
                                    <span class="art-button-wrapper">
                                        <span class="l"> </span>
                                        <span class="r"> </span>
                                        <a class="art-button" id="btn-rent" href="javascript:void(0)">Arrendar</a>
                                    </span>
                                </p>
                            @endif
                            
                            <div class="col-md-12 hidden" id="panel-rent">
                                <div class="row">
                                    <form action="{{ route('BarbecueRent') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_barbecue" value="{{ $barbecue->id }}">
                                        <div class="panel panel-success panel-bordered">
                                            <button type="button" class="close" id="btn-close" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Desde:</label>
                                                            <input type="text" name="from" class="form-control datetimepicker">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Hasta:</label>
                                                            <input type="text" name="to" class="form-control datetimepicker">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="submit" value="Aceptar" class="btn btn-success">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                    
                            @if ($barbecue->id_user == \Auth::user()->id)
                                <div class="col-md-12">
                                    <div class="row">
                                        <h3>Historial de arrendaciones</h3>
                                            
                                            @if ($barbecue->users->count() > 0)
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Arrendador</th>
                                                            <th>Desde</th>
                                                            <th>Hasta</th>
                                                            <th>Fecha de arrendación</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($barbecue->users as $user)
                                                            <tr>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($user->pivot->from)->format('d/m/Y H:i') }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($user->pivot->to)->format('d/m/Y H:i') }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($user->pivot->created_at)->format('d/m/Y H:i') }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                        
                                            @else
                                                <h5>Esta barbacoa no ha sido rentada</h5>
                                            @endif
                                        </div>
                                        
                                    </div>
                            @endif
                        </div>
                        <div class="cleared"></div>
                    </div>
                </div>
            </div>
        </div>
<script>
    $(function() {
        $('.datetimepicker').datetimepicker({
            format:'DD/MM/YYYY HH:mm'
        });
        togglePanel();
        function togglePanel () {
            $('#btn-rent').on('click', function () {
                $('#panel-rent').removeClass('hidden');
                return false;
            });
            $('#btn-close').on('click', function () {
                $('#panel-rent').addClass('hidden');
                return false;
            });
        }
    });
</script>
@endsection