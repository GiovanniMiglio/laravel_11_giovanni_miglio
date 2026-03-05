<div class="anime-card">
    <div class="anime-card-inner">

        @if($article->image_url)
            <img src="{{ $article->image_url }}" 
                 class="img-fluid mb-3" 
                 style="border-radius: 8px;">
        @endif

        <h3 class="anime-card-title">{{ $article->title }}</h3>

        @if($article->category)
            <p class="text-warning mb-1">
                <strong>Categoria:</strong> {{ $article->category }}
            </p>
        @endif

        @if($article->author)
            <p class="text-info mb-1">
                <strong>Autore:</strong> {{ $article->author }}
            </p>
        @endif

        @if($article->excerpt)
            <p class="anime-card-text">{{ $article->excerpt }}</p>
        @endif

        <a href="{{ route('articles.show', $article->id) }}" 
           class="anime-card-btn mt-3">
            Leggi di più
        </a>

    </div>
</div>