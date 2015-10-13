@extends('layouts.html')

@section('content')
    <h1>Create New Song</h1>
    {!! Form::open(['route' => 'songs.store']) !!}
        @include('songs.form', ['submitButtonText' => 'Add Song', 'mode' => ''])
    {!! Form::close() !!}
@endsection
