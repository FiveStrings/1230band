<div id="alert-box" class="alert alert-danger" {!! $errors->any() ? '' : "style=\"display: none\"" !!} >
    <b>Error...</b>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@if(Session::has('flash_message'))
    <div class="alert alert-info">
        {{ Session::get('flash_message') }}
    </div>
@endif