<div class="col-md-4 mb-4">
    <div class="anime-card" style="height: 100%;">
        <div class="anime-card-inner">
            
            @if($article->image_url)
            <img src="{{ $article->image_url }}" 
            class="img-fluid mb-3" 
            style="border-radius: 8px; width: 100%; height: auto; object-fit: contain;">
            
            @endif
            
            <h3 class="anime-card-title" style="font-size: 1.2rem;">
                {{ $article->title }}
            </h3>
            
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
            <p class="anime-card-text" style="font-size: 0.9rem;">
                {{ Str::limit($article->excerpt, 80) }}
            </p>
            @endif
            {{-- TAG --}}
            @if ($article->tags && $article->tags->count() > 0)
            <div class="mt-2">
                @foreach ($article->tags as $tag)
                <span class="badge bg-warning text-dark" 
                style="margin-right: 4px; margin-bottom: 4px;">
                #{{ $tag->name }}
            </span>
            @endforeach
        </div>
        @endif
        
        
        <a href="{{ route('articles.show', $article->id) }}" 
            class="anime-card-btn mt-3">
            ✦ Leggi di più ✦
        </a>
        
    </div>
</div>
</div>
