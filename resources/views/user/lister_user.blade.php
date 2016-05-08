@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Utilisateurs du site</div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Pseudo</th>
                                <th>Nom</th>
                                <th>Prenom</th>
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
                                            <td>{{ $user->pseudo }} (Administrateur du site) <img
                                                        src="{{URL::asset('user/male.png')}}"></td>
                                        @else
                                            <td>{{ $user->pseudo }}<img
                                                        src="{{URL::asset('user/male.png')}}"></td>
                                        @endif
                                            <td>{{ $user->nom }}</td>
                                            <td>{{ $user->prenom }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telephone }}</td>
                                            <td>
                                                <a class="btn btn-info" href="/user/editer/{{ $user->id }}">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Edit
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