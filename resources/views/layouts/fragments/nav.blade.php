@guest

    <nav class="navbar fixed-top navbar-expand-lg navbar-librory bg-librory">

        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-alt-menu" aria-controls="navbar-alt-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-alt-menu">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
            </div>
        </div>

    </nav>

@else

    <div id="nav-alt">

        <div class="d-flex justify-content-between">

            <div class="nav-trigger-wrap d-xl-none d-lg-none">
                <button type="button" class="nav-trigger">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>

            <div class="upanel-wrap">
                <ul>
                    <li class="upanel dropdown">
                        <a href="#" id="upanel-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        >
                            <i class="fas fa-user-circle fa-fw fa-lg"></i>
                            <span>{{ auth()->user()->first_name }}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="upanel-dropdown">
                            <a class="dropdown-item" href="#">Account Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

    </div>
    <nav class="librory-nav">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-home fa-fw fa-lg"></i>
                    <span>{{ config('app.name') }}</span>
                </a>
            </li>

            @if (auth()->user()->isLibrorian())
                <li>
                    <a href="{{ route('categories.all') }}">
                        <i class="fas fa-list-alt fa-fw fa-lg"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('authors.all') }}">
                        <i class="fas fa-address-book fa-fw fa-lg"></i>
                        <span>Authors</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('publishers.all') }}">
                        <i class="fas fa-briefcase fa-fw fa-lg"></i>
                        <span>Publishers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('shelves.all') }}">
                        <i class="fas fa-server fa-fw fa-lg" data-fa-transform="rotate-270"></i>
                        <span>Shelves</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('members.all') }}">
                        <i class="far fa-id-card fa-fw fa-lg"></i>
                        <span>Members</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->isMember())
                <li>
                    <a href="#">
                        <i class="fas fa-list-ol fa-fw fa-lg"></i>
                        <span>Member Only</span>
                    </a>
                </li>
            @endif

        </ul>
    </nav>

@endguest
