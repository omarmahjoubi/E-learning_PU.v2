@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="text-center">Nos Thémes</h1>
        </div>
        <p class="lead text-center">Voici tous les thémes preésent dans notre catalogue</p>
        <div class="container">

            @while($i < $taille)
                @if(($i / 3 == 0)) && ($i!=0))
                    {{ $j = $nb_tour*3 + 0 }}
                    {{ $nb_tour++ }}
                    {{ $max = 3 + $nb_tour*3 }}
                @endif
                @for($j  ; $j < $max  ; $j++)
                @if ($i / 3 == 0)
                <div class="row stylish-panel">
                @endif
                    <div class="col-md-4">
                        <div>
                            <img src="{{URL::asset('/images/'.$li_themes[$j]->url_img)}}" alt="Texto Alternativo"
                                 class="img-circle img-thumbnail">
                            <h2>{{ $li_themes[$j]->name }}</h2>
                            <p>{{ $li_themes[$j]->description }}
                            </p>
                            <a href="#" class="btn btn-primary" title="See more">See works »</a>
                        </div>
                    </div>

                    @endfor
                </div>
                    {{ $i++ }}

                @endwhile


        </div>
    </div>
@endsection
