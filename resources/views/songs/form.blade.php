{!! csrf_field() !!}

<div class="form-group @if($errors->has('title')) has-error @endif">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    @if($errors->has('title'))<span class="help-block">{{ $errors->first('title') }}</span>@endif
</div>

<div class="form-group @if($errors->has('artist')) has-error @endif">
    {!! Form::label('artist', 'Artist:') !!}
    {!! Form::text('artist', null, ['class' => 'form-control']) !!}
    @if($errors->has('artist'))<span class="help-block">{{ $errors->first('artist') }}</span>@endif
</div>
<div class="form-group @if($errors->has('mode')) has-error @endif">
    <div class="radio">
        <label>
            {!! Form::radio('mode', 'chordpro', $mode=='chordpro') !!}
            ChordPro format
        </label>
    </div>
    <div class="radio">
        <label>
            {!! Form::radio('mode', 'text', $mode=='text') !!}
            Plain text format
        </label>
    </div>
    @if($errors->has('mode'))<span class="help-block">{{ $errors->first('mode') }}</span>@endif
</div>

<div class="form-group @if($errors->has('body')) has-error @endif">
    {!! Form::label('body', 'Song Body:') !!}
    @if($errors->has('body'))<span class="help-block">{{ $errors->first('body') }}</span>@endif
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 20]) !!}
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