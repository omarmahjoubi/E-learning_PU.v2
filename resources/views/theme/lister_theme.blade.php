@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

    @if( ! empty(session('msg_ajout')))
        <div class="alert alert-success" role="alert">
            <strong>Opération réussie ! </strong>{{ session('msg_ajout') }}
        </div>
    @endif
    @if( ! empty(session('msg_modif')))
        <div class="alert alert-success" role="alert">
            <strong>Opération réussie ! </strong>{{ session('msg_modif') }}
        </div>
    @endif
    @if( ! empty(session('msg_suivi')))
        <div class="alert alert-success" role="alert">
            <strong><h4>{{ session('msg_suivi') }}</h4></strong>
        </div>
    @endif
    @if( ! empty(session('msg')))
        <div class="alert alert-warning" role="alert">
            <strong><h4>{{ session('msg') }} ! </h4></strong>
        </div>
    @endif


            </div>
        </div>
    </div>




    <div class="container">
        <div class="page-header">
            <h1 class="text-center">Nos Thémes</h1>
        </div>
        <p class="lead text-center">Voici tous les thémes présent dans notre catalogue</p>
        <div class="container">

            @foreach($li_themes as $theme)
                <div class="row stylish-panel">
                    @for($k = 0 ; $k < count($theme) ; $k++)
                        <div class="col-md-4">
                            <div>
                                <a href="/theme/lister_cours/{{ $theme[$k]->name }}">
                                    <img src="{{URL::asset('/images/'.$theme[$k]->url_img)}}"
                                         alt="Texto Alternativo"
                                         class="img-circle img-thumbnail">
                                </a>
                                <h2>{{ $theme[$k]->name }}</h2>
                                <p>{{ $theme[$k]->description }}
                                </p>
                                {{ $trouve = "  " }}
                                @if (Auth::user()->admin!=1)
                                    @foreach($liste_id as $id )
                                        @if ($id == $theme[$k]->id)
                                            <div class="alert alert-success" role="alert">
                                                Vous êtes en train de suivre ce théme.
                                            </div>
                                            <a href="/annuler_suivi_theme/{{Auth::user()->id}}/{{$theme[$k]->id}}"
                                                   class="btn btn-warning" > ne plus suivre ce théme</a>
                                            {{ $trouve = " " }}
                                            @break 2
                                        @endif
                                    @endforeach
                                    @if(strcmp(" ",$trouve) != 0)
                                        <a href="/suivre_theme/{{Auth::user()->id}}/{{$theme[$k]->id}}"
                                           class="btn btn-primary"
                                           title="suivre theme"> suivre theme »</a>
                                    @endif
                                @endif

                                @if(Auth::user()->admin == 1)
                                    <a class="btn btn-danger" href="/theme/supprimer/{{ $theme[$k]->id }}">
                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                        Delete
                                    </a>
                                    <a class="btn btn-info" href="/theme/editer/{{ $theme[$k]->id }}">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                        Edit
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endfor
                </div>
            @endforeach


        </div>
    </div>
@endsection
