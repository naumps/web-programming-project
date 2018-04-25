<header>

    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="{{route('movies')}}" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                    <circle cx="12" cy="13" r="4"></circle>
                </svg>
                <strong>Album</strong>
            </a>


            @auth
                <span class="navbar-brand d-flex align-items-center">

                    <strong>Hi, {{auth()->user()->name}}!</strong>
                </span>
            @endauth

        </div>


        <div class="dropdown show">

            <a style="padding-right: 40px" class="btn btn-secondary dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Options
            </a>

            <div class="dropdown-menu">

                <a class="dropdown-item" href="{{route("home")}}">Movies</a>
                <a class="dropdown-item" href="{{route('actors')}}">Actors</a>
                <a class="dropdown-item" href="{{route('categories')}}">Categories</a>
                <a class="dropdown-item" href="{{route('directors')}}">Directors</a>
                @auth
                    @if(auth()->user()->role === 'subscriber' )
                        <a class="dropdown-item" href="{{route('my_lists')}}">My lists</a>
                        <a class="dropdown-item" href="{{route('change_plan')}}">Change Plan</a>
                    @else
                        @if(auth()->user()->role ==='user')
                            <a class="dropdown-item" href="{{route('subscriptions')}}">Subscribe</a>
                        @endif
                    @endif

                    @if(auth()->user()->role ==='editor')
                        <a class="dropdown-item" href="{{route('my_lists')}}">My lists</a>
                        <a class="dropdown-item" href="{{route('my_movies')}}">My movies</a>
                    @endif


                    @if(auth()->user()->role ==='admin')
                        <a class="dropdown-item" href="{{route('my_movies')}}">My movies</a>
                        <a class="dropdown-item" href="{{route('my_lists')}}">My lists</a>
                        <a class="dropdown-item" href="{{route('lists')}}">All lists</a>
                        <a class="dropdown-item" href="{{route('users')}}">Users</a>
                    @endif

                    <a class="dropdown-item" href="{{route('2fa')}}">Two factor auth</a>
                    <form method="POST" action="{{url("logout")}}">
                        {{csrf_field()}}
                        <button class="dropdown-item">Log out</button>
                    </form>

                @else

                    <a class="dropdown-item" href="{{route('login')}}">Sign in</a>
                @endauth

            </div>
        </div>

    </div>
</header>

