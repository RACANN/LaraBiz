<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <i class="fa fa-home"></i>
        </a>

        <a  class="navbar-item" href="/timeclock"><i class="fa fa-clock"></i></a>
        <a  class="navbar-item" href="/pos"><i class="fa fa-shopping-bag"></i></a>
        <a  class="navbar-item" href=""><i class="fa fa-question-circle"></i></a>

        <div class="navbar-burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    @if (Route::has('login'))
        @auth
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary" href="{{ url('/home') }}">Home</a>
                        <a class="button is-light" href="{{ url('/logout') }}">Logout</a>
                    </div>
                </div>
            </div>
            @else
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary" href="{{ route('login') }}">Login</a>
                            <a  class="button is-light" href="{{ route('register') }}">Register</a>
                        </div>
                    </div>
                </div>
                @endauth

            @endif
</nav>
