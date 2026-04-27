<x-layout>

    <section class="hero-anime d-flex align-items-center">
        <div class="hero-overlay"></div>

        <div class="container text-center hero-content">
            <h1 class="display-4 fw-bold text-white">Benvenuto nel Mondo Anime & Manga</h1>
            <p class="lead text-white-50">Esplora personaggi, storie e avventure leggendarie</p>
            <a href="{{ route('articles.index') }}" class="btn btn-light btn-lg mt-3">
                Inizia il Viaggio
            </a>
        </div>
    </section>

    <div class="section-articles">
        <div class="container">
            <h2 class="text-center">Ultimi Articoli</h2>

            <div class="row mt-4">

                @foreach ($articles as $article)
                    <div class="col-md-4 mb-4">
                        <div class="anime-card">
                            <div class="anime-card-inner">

                                @if($article->image_url)
                                    <img src="{{ $article->image_url }}" alt="{{ $article->title }}">
                                @endif

                                <h3 class="anime-card-title mt-3">{{ $article->title }}</h3>

                                <p class="anime-card-text">
                                    {{ Str::limit($article->excerpt, 80) }}
                                </p>

                                <a href="{{ route('articles.show', $article) }}" class="anime-card-btn mt-3">
                                    Leggi di più
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</x-layout>
