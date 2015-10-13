@extends('layouts.html')

@section('content')
    <h1>Edit {{ $song->title }} <small>by {{ $song->artist }}</small></h1>
    {!! Form::model($song, ['method' => 'PATCH', 'route' => ['songs.update', $song]]) !!}
        @include('songs.form', ['submitButtonText' => 'Save Changes'])
    {!! Form::close() !!}
@endsection