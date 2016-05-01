@extends('layouts.app')
@section('content')
    @foreach( $li_cours as $cour)
        {{ $cour->name }}
    @endforeach
@endsection