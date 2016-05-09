@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading"><h1 class="text-center">{{ $nom_theme }}</h1></div>
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
                    @if(count($li_cours)==0)
                        <p class="lead text-center">Pour l'instant ,Ce théme ne comporte aucun cours</p>
                    @else

                        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                            <thead>
                            <tr>
                                <th>nom du cours</th>
                                <th>auteur du cours</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($li_cours as $cours)
                                <tr>
                                    <td>{{ $cours->name }}</td>
                                    <td class="center">{{ $cours->auteur_name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="/cours/afficher/{{ $cours->url }}">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            View
                                        </a>
                                        @if(Auth::user()->admin==1)
                                            <a class="btn btn-info" href="/cours/editer/{{ $cours->id }}">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="/cours/supprimer/{{ $cours->id }}">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection