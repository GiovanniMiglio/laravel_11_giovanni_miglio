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
        <h2 class="text-center ">Ultimi Articoli</h2>
    </div>
</div>

</x-layout>