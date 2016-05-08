@extends('layouts.app')
@section('content')
    @if( ! empty(session('msg')))
        <div class="alert alert-warning" role="alert">
            <strong>{{ session('msg') }} ! </strong>
        </div>
    @endif

    <div class="container">
        <div class="page-header">
            <h1 class="text-center">Mes Thémes</h1>
        </div>
        @if (count($liste_themes) == 0)
            <p class="lead text-center">Pour l'instant , vous ne suivez aucun théme</p>
        @else
            <p class="lead text-center">Voici tous les thémes que vous êtes en train de suivre</p>
            <div class="container">

                @foreach($liste_themes as $theme)
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

                                    <a href="/annuler_suivi_theme/{{Auth::user()->id}}/{{$theme[$k]->id}}"
                                       class="btn btn-warning"
                                      >ne plus suivre ce théme</a>
                                </div>
                            </div>
                        @endfor
                    </div>
                @endforeach


            </div>
        @endif
    </div>
@endsection