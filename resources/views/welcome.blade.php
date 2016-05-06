@extends('layouts.app')

@section('content')



    <div id="myCarousel" class="carousel slide" data-ride="carousel"
         style="width:800px; margin: 0 auto ; height :500px">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            @for ($i = 1 ; $i < sizeof($li_themes) ; $i++)
                <li data-target="#myCarousel" data-slide-to="{{ $i }}"></li>
            @endfor
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">

                <img src="{{URL::asset('/images/'.$li_themes[0]->url_img)}}">

                <div class="carousel-caption">
                    <h1><span></span></h1>

                </div>
            </div>


            @for($i = 1 ; $i <sizeof($li_themes) ;$i++)
                <div class="item">
                    <img
                        src="{{URL::asset('/images/'.$li_themes[$i]->url_img)}}">


                    <div class="carousel-caption">
                        <h1><span></span></h1>

                    </div>
                </div>


            @endfor
        </div>
        </div>


        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>


        <footer>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        </footer>
@endsection
