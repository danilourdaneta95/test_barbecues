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
                    <span class="art-PostHeader">Bienvenido, {{ \Auth::user()->name }}</span>
                </h2>
                <div class="art-PostContent">
                    
                    <img class="art-article" src="images/barbacoa.jpg" alt="an image" style="float:left;max-width:250px;" />
                    <br>
                    <p>Aqui podrá encontrar y rentar las mejores barbacoas disponibles para usted.
                     También podrá publicar sus barbacoas y rentarlas al público</p>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Barbacoas disponibles en mi área</h3>
                        </div>
                    </div>
                    <div class="row">
                        @if($barbecues->count() > 0)
                            @foreach ($barbecues as $barbecue)
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
                                                    <p>{{ $barbecue->description }}<br>
                                                    <label for="">Arrendador: </label> <a href="{{ route('UserShow', $barbecue->userCreated->id) }}">{{ $barbecue->userCreated->name }}</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <h5>No hay barbacoas disponibles</h5>
                            </div>
                        @endif
                    </div>
                        
                </div>
                <div class="cleared"></div>
            </div>
        </div>
    </div>
</div>
@endsection