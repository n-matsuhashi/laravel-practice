<nav>
    <ul>
        @if(session('user_email'))
            <li>Hi, {{ session('user_email') }}</li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
        @endif
    </ul>
</nav>
