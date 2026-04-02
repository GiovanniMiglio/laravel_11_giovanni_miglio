<nav class="navbar navbar-expand-lg navbar-anime">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Anime&Manga Blog</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">Articoli</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('my-articles') }}">I miei Articoli</a>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.create') }}">Crea Articolo</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>