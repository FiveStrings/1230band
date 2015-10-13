@extends('layouts.html')

@section('content')
    @include('shared.alert')
    <h2>Performances</h2>
    <table width="100%" id="performances-table" class="table table-bordered table-responsive hoverb">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Location</th>
                <th>Date</th>
            </tr>
        </thead>
    </table>
@endsection

@push('scripts')
    <script type="text/javascript">
        $('#songs-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route("performances.index") !!}',
            columns: [
                {data: 'id', visible: false},
                {data: 'title', name: 'title'},
                {data: 'location', name: 'location'},
                {data: 'date', name: 'date'}
            ]
        });
    </script>
@endpush