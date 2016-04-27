@extends('layouts.app')
@section('content')
    @if( ! empty($msg_ajout))
        <div class="alert alert-success">
            <div class="alert alert-success">
                <strong>Success! </strong>{{ $msg_ajout }}
            </div>
            @endif
            @if( ! empty($msg_modif))
                <div class="alert alert-success">
                    <div class="alert alert-success">
                        <strong>Success! </strong>{{ $msg_modif }}
                    </div>
                    @endif
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                        <tr>
                            <th>nom du cours</th>
                            <th>auteur du cours</th>
                            <th>theme du cours</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($li_cours as $cours)
                            <tr>
                                <td>{{ $cours->name }}</td>
                                <td class="center">{{ $cours->auteur}}</td>
                                <td class="center">{{ $cours->theme }}</td>
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
                </div>
@endsection