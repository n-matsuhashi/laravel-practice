@php(session_start())

<nav>
    <ul>
        @if(!empty($_SESSION['user_email']))
            <li>Hi, {{ $_SESSION['user_email'] }}</li>
            <form method="POST" action="/logout.php">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <li><a href="/login.php">Login</a></li>
        @endif
    </ul>
</nav>
