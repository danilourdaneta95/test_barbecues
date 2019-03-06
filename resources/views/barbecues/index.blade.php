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
                    <span class="art-PostHeader">Barbecues</span>
                </h2>
                <div class="art-PostContent">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Mis barbacoas</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('NewBarbecue') }}">Nueva</a>
                        </div>
                    </div>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            @if(\Auth::user()->myBarbecues->count() > 0)
                                @foreach(\Auth::user()->myBarbecues as $barbecue)
                                    <div class="col-md-4">
                                        <div class="art-Block">
                                            <div class="art-Block-body">
                                                <div class="art-BlockHeader">
                                                    <div class="l"></div>
                                                    <div class="r"></div>
                                                    <a href="{{ route('BarbecueShow', $barbecue->id) }}">
                                                        <div class="t text-center">{{ $barbecue->model }}</div>
                                                    </a>
                                                </div>
                                                <div class="art-BlockContent">
                                                    <div class="art-PostContent">
                                                        <a href="{{ route('BarbecueShow', $barbecue->id) }}">
                                                            <img src="images/pictures/{{ $barbecue->picture }}" width="55px" height="55px" alt="an image" style="margin: 0 auto; display: block; border: 0" />
                                                        </a>
                                                        <p>{{ $barbecue->description }}</p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h4>Usted no tiene barbacoas</h4>
                            @endif
                        </div>
                    </div>
                        
                </div>
                <div class="cleared"></div>
            </div>
        </div>
    </div>
    <div class="art-Post">
        <div class="art-Post-body">
            <div class="art-Post-inner">
                <div class="art-PostContent">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Alquiladas por mi</h3>
                        </div>
                    </div>
                    @if(\Auth::user()->barbecues->count() > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Modelo</th>
                                    <th>Desde</th>
                                    <th>Hasta</th>
                                    <th>Arrendatario</th>
                                    <th>Fecha de arrendamiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\Auth::user()->barbecues as $barbecue)
                                    @if ($barbecue->pivot->taken)
                                        <tr>
                                            <td><a href="{{ route('BarbecueShow', $barbecue->id) }}">{{ $barbecue->model }}</a></td>
                                            <td>{{ \Carbon\Carbon::parse($barbecue->pivot->from)->format('d/m/Y H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($barbecue->pivot->to)->format('d/m/Y H:i') }}</td>
                                            <td><a href="{{ route('UserShow', $barbecue->userCreated->id) }}">{{ $barbecue->userCreated->name }}</a></td>
                                            <td>{{ \Carbon\Carbon::parse($barbecue->pivot->created_at)->format('d/m/Y H:i') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4>Usted no ha arrendado ninguna barbacoa todavía</h4>
                    @endif
                </div>
                <div class="cleared"></div>
            </div>
        </div>
    </div>
</div>
@endsection