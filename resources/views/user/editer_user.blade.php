@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifier mon profil{{ $user->name }}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="/user/modifier/{{ $user->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Pseudo:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ $user->name }}">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="exampleTextarea" class="control-label col-sm-2">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="email"
                                           value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Telephone:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="telephone"
                                           value="{{ $user->telephone }}">
                                </div>
                            </div>

                            <div class="form-group">

                                <label class="control-label col-sm-2" for="sexe">Sexe :</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="sexe" name="sexe">

                                        @if($user->sexe === 'M')
                                            <option selected>M</option>
                                        @else
                                            <option>M</option>
                                        @endif
                                        @if($user->sexe === 'F')
                                            <option selected>F</option>
                                        @else
                                            <option>F</option>
                                        @endif
                                        <option></option>

                                    </select>
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