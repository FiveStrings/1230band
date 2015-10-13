<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                12:30 Band
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class=""><a href="#">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Songs <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('songs.index') }}">Song Database</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ route('songs.create') }}">
                                <i class="fa fa-plus-circle"></i>
                                Add New Song
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Performances <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('performances.index') }}">Performances List</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ route('performances.create') }}">
                                <i class="fa fa-plus-circle"></i>
                                Add New Performance
                            </a>
                        </li>
                    </ul>
                </li>            </ul>
        </div>
    </div>
</nav>

@push('styles')

@endpush