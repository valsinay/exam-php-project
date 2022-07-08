<style>
nav {
    height: 74px;
    padding: 0px;
}

li a {
    text-decoration: none;
    color: black;
}
</style>

<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
    <div class="collapse navbar-collapse" id="navbarSupportedContent" background="blreack">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/students">
                <img src="/student_logo.png" alt="" width="90px">My Student System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacts</a>
                    </li>

                </ul>
            </div> -->
        </nav>

        <ul class="navbar-nav ms-auto" >
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" style="text-align:right">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item">
                <a class="nav-link">
                    Welcome, {{ Auth::user()->name }}!
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('students.index') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </li>
            @endguest
        </ul>
    </div>
</nav>