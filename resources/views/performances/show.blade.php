@extends('layouts.html')

@section('content')
    @include('shared.alert')
    <div class="btn-toolbar">
        <div id="song-toolbar" class="btn-group" role="group">
            <a href="{!! route('songs.edit', [$song, 'mode' => 'chordpro']) !!}" class="btn btn-default">Edit as ChordPro</a>
            <a href="{!! route('songs.edit', [$song, 'mode' => 'text']) !!}" class="btn btn-default">Edit as Plain Text</a>
        </div>
        <div id="song-toolbar" class="btn-group" role="group">
            <a href="#" class="btn btn-default">Transpose Up</a>
            <a href="#" class="btn btn-default">Transpose Down</a>
        </div>
        <div id="song-toolbar" class="btn-group" role="group">
            {!! Form::open(['method' => 'DELETE', 'route' => ['songs.destroy', $song]]) !!}
            {!! Form::submit('Delete Song', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <br><br>
    @foreach($pages as $page)
        <div class="song-page-container">
            <div id="song-page" class="song-page"><div class="title">{{ $song->title }} by {{ $song->artist }}</div>{!! $page !!} </div>
        </div>
    @endforeach
@endsection

@push('styles')
    <style type="text/css">
        .song-title {
            font-style: italic;
        }

        .song-page-container {
            font-size: 11pt;
            line-height: 1.3;
            font-family: monospace;
            /*width: 100%;*/

            border-width: 1px;
            border-style: solid;
            border-color: #959595;

            background-color: #FFFFFF;

            -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2), inset 0 0 10px rgba(0, 0, 0, 0.03);
            -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2), inset 0 0 10px rgba(0, 0, 0, 0.03);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2), inset 0 0 10px rgba(0, 0, 0, 0.03);
            padding: 10px;
            display: inline-block;
        }

        .song-page-container .song-page{
            font-size: 11pt;
            /*height: 72em;*/
            width: 104ch;
            white-space: pre;
            color: #000000;
        }

        .song-page-container .song-page .chords, .song-page-container .song-page .lyrics {
            height: 1.3em;
            position: relative;
            /*font-weight: bold;*/
        }
        .song-page-container .song-page .chords .chord, .song-page-container .song-page .lyrics .lyric {
            display: inline-block;
            position: absolute;
        }

        .chord {
            color: #006666;
        }

        .song-page-container .song-page .title {
            font-weight: bold;
        }
        .song-page-container .song-page .header {
            font-weight: bold;
            margin-top: 1em;
        }
        .song-page-container .song-page .comment {
            color: #990000;
            font-weight: bold;
            font-style: italic;
        }
        .song-page-container .song-page .repeat {
            font-weight: bold;
            margin-top: 1em;
            font-style: italic;
        }
        .song-page-container .song-page .chorus {
            border: 1px solid black;
            padding: 1ch;
            margin-top: 1em;
        }
        .song-page-container .song-page .chorus .header {
            margin-top: 0;
        }
    </style>
@endpush

@push('scripts')

@endpush