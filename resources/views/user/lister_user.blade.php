@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Utilisateurs du site</div>
                    <div class="panel-body">
                        @if( ! empty(session('msg_supp')))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('msg_supp') }}</strong>
                            </div>
                        @endif
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>E-mail</th>
                                <th>Télèphone</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($liste_user as $user)
                                <tr>
                                    @if(Auth::user()->id != $user->id)
                                        @if ($user->admin == 1)
                                            <td>{{ $user->name }} (Administrateur du site) <img
                                                        src="{{URL::asset('user/male.png')}}"></td>
                                        @else
                                            <td>{{ $user->name }}
                                                @if($user->sexe === 'M')
                                                    <img src="{{URL::asset('user/male.png')}}"></td>
                                            @elseif($user->sexe === 'F')
                                                <img src="{{URL::asset('user/female.png')}}"></td>
                                            @else
                                            @endif
                                        @endif
                                        <td>{{ $user->email }}</td>
                                        <td> {{ !empty($user->telephone) ? $user->telephone : "non spécifié" }}</td>
                                        <td>
                                            <a class="btn btn-info" href="/user/editer/{{ $user->id }}">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="/user/supprimer/{{ $user->id }}">
                                                Delete
                                            </a>
                                        </td>
                                    @else
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection