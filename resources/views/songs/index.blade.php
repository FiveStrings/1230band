@extends('layouts.html')

@section('content')
    @include('shared.alert')
    <h2>Songs</h2>
    <table width="100%" id="songs-table" class="table table-bordered table-responsive hoverb">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
@endsection

@push('scripts')
    <script type="text/javascript">
        $('#songs-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route("songs.index") !!}',
            columns: [
                {data: 'id', visible: false},
                {data: 'title', name: 'title'},
                {data: 'artist', name: 'artist'},
                {data: 'actions', name: 'actions', sortable: false}
            ]
        });
    </script>
@endpush