@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Formulaire d'ajout d'un cours</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="/cours/modifier/{{ $cours->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nom du cours:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ $cours->name }}" placeholder="Entrez le nom du cours">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="auteur">Auteur :</label>
                                <div class="col-sm-10">
                                    <!-- la liste des auteurs ne veut pas s'afficher -->
                                    <input type="text" list="cars" id="auteur" name="auteur" />
                                    <datalist id="cars">
                                        @foreach ($li_auteurs as $auteur)
                                            <option>{{ $auteur->name }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="theme">Théme:</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" id="theme" name="theme" >
                                        @foreach ($li_themes as $theme)
                                            @if ($theme->id == $id_theme)
                                                <option selected="selected"> {{ $theme->name }}</option>
                                            @else
                                                <option>{{ $theme->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="url">Fichier du cours:</label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <span class="btn btn-default btn-file"><input
                                                    value="{{ $chemin }}" type="file" id="url" name="url"/></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection