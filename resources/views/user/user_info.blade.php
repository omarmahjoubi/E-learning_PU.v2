@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(Auth::user()->admin == 1)
                            Profil de l'utilisateur {{ $user->pseudo }}
                        @else
                            Votre Profil
                        @endif
                    </div>
                    <div class="panel-body">
                        @if( ! empty(session('msg_modif')))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('msg_modif') }}</strong>
                            </div>
                        @endif
                        <div class="list-group">
                            <a href="#" class="list-group-item active">
                                <h4 class="list-group-item-heading">
                                    Informations personels
                                </h4>
                            </a>

                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    Pseudo
                                    @if($user->sexe === "M")
                                        <img src="{{URL::asset('user/male.png')}}">
                                    @elseif($user->sexe === "F")
                                        <img src="{{URL::asset('user/female.png')}}">
                                    @else
                                    @endif
                                </h4>

                                <p class="list-group-item-text">
                                    {{ $user ->pseudo }}
                                </p>
                            </a>

                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    Nom
                                </h4>

                                <p class="list-group-item-text">
                                    {{ $user ->nom }}
                                </p>
                            </a>

                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    Prenom
                                </h4>

                                <p class="list-group-item-text">
                                    {{ $user ->prenom }}
                                </p>
                            </a>

                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    E-mail
                                </h4>

                                <p class="list-group-item-text">
                                    {{ $user->email }}
                                </p>
                            </a>

                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    Telphone
                                </h4>

                                <p class="list-group-item-text">
                                    {{ $user ->telephone }}
                                </p>
                            </a>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection