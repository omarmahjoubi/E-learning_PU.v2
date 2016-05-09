@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(Auth::user()->admin == 1)
                            Profil de l'utilisateur {{ $user->name }}
                        @else
                            Votre Profil
                        @endif
                    </div>
                    <div class="panel-body">
                        @if( ! empty(session('msg_modif')))
                            <div class="alert alert-success" role="alert">
                                @if(Auth::user()->admin==1)
                                    <strong>Le profil de l'utilisateur {{ $user->name }} a été modifié</strong>
                                    @else
                                    <strong>{{ session('msg_modif') }}</strong>
                                    @endif
                            </div>
                        @endif
                        <div class="list-group">
                            <a href="#" class="list-group-item active">
                                <h4 class="list-group-item-heading">
                                    Informations personelles
                                </h4>
                            </a>

                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    Username
                                </h4>

                                <p class="list-group-item-text">
                                    {{ $user ->name }}
                                    @if($user->sexe === "M")
                                        <img src="{{URL::asset('user/male.png')}}">
                                    @elseif($user->sexe === "F")
                                        <img src="{{URL::asset('user/female.png')}}">
                                    @else
                                    @endif
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
                                    Telephone
                                </h4>

                                    <p class="list-group-item-text">
                                        {{ !empty($user->telephone) ? $user->telephone : "non spécifié" }}
                                    </p>



                            </a>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection