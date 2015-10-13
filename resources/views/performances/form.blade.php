{!! csrf_field() !!}

<div class="form-group @if($errors->has('title')) has-error @endif">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    @if($errors->has('title'))<span class="help-block">{{ $errors->first('title') }}</span>@endif
</div>

<div class="form-group @if($errors->has('location')) has-error @endif">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
    @if($errors->has('location'))<span class="help-block">{{ $errors->first('location') }}</span>@endif
</div>

<div class="form-group @if($errors->has('date')) has-error @endif">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['id' => 'datepicker', 'class' => 'form-control']) !!}
    @if($errors->has('date'))<span class="help-block">{{ $errors->first('date') }}</span>@endif
</div>

{!! Form::submit($submitButtonText, ['class' => 'btn btn-info']) !!}

@push('styles')
    <style type="text/css">
        textarea {
            white-space: pre;
            font-family: monospace;;
        }
    </style>
@endpush