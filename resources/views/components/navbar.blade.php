<header>
    <nav>
        <h1>
            <a href="{{ route('ninjas.index') }}">Ninja Network</a>
        </h1>

        @guest
            <a href="{{ route('show.login') }}" class="btn">Login</a>
            <a href="{{ route('show.register') }}" class="btn">Register</a>
        @endguest

        @auth
            <a href="{{ route('show.profile') }}">
                <span class="border-r-2 pr-5">
                    Hi there, {{ Auth::user()->name }}
                </span>
            </a>
            <a href="{{ route('ninjas.create') }}">Create New Ninja</a>
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn">Logout</button>
            </form>
        @endauth
    </nav>
</header>
