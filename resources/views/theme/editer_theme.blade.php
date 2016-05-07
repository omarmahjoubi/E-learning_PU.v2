@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Formulaire de modification du théme {{ $theme->name }}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="/theme/modifier/{{ $theme->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nom du théme:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                          value="{{ $theme->name }}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleTextarea" class="control-label col-sm-2">Description du théme</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" id="exampleTextarea" rows="3" name="description"
                                          id="description" >{{ $theme->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="url_img">Fichier du cours:</label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <span class="btn btn-default btn-file"><input
                                                    type="file" id="url_img" name="url_img"/></span>
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