@extends('layouts.html')

@section('content')
    <h1>Create New Performance</h1>
    {!! Form::open(['route' => 'performances.store']) !!}
        @include('performances.form', ['submitButtonText' => 'Add Performance'])
    {!! Form::close() !!}
@endsection
