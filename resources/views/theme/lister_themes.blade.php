@extends('layouts.app')
@section('content')
    <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>
                <th>nom du théme</th>
                <th>description du théme</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($li_themes as $theme)
                <tr>
                    <td>{{ $theme->name }}</td>
                    <td class="center">{{ $theme->description}}</td>
                    <td>
                        <a class="btn btn-info" href="/theme/lister_cours/{{ $theme->name }}">
                            <i class="glyphicon glyphicon-edit icon-white"></i>
                            Lister les cours
                        </a>

                        @if(Auth::user()->admin == 1)
                            <a class="btn btn-danger" href="/theme/supprimer/{{ $theme->id }}">
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