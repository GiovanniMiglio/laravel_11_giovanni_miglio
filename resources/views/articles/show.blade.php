<x-layout>
    
    <section class="bg-onepiece">
        <div class="container py-5">
            
            <div class="anime-character-card mx-auto">
                
                <div class="character-header">
                    <h1 class="character-title">{{ $article->title }}</h1>
                </div>
                
                <div class="character-body">
                    
                    <div class="character-image">
                        <img src="{{ $article->image_url ?? 'https://i.imgur.com/8fKQZQp.png' }}" 
                        alt="Immagine Articolo">
                    </div>
                    
                    <div class="character-info">
                        
                        @if($article->category)
                        <h3>Categoria</h3>
                        <p>{{ $article->category }}</p>
                        @endif
                        
                        @if($article->author)
                        <h3>Autore</h3>
                        <p>{{ $article->author }}</p>
                        @endif
                        
                        @if($article->excerpt)
                        <h3>Descrizione breve</h3>
                        <p>{{ $article->excerpt }}</p>
                        @endif
                        
                        <h3>Contenuto</h3>
                        <p>{{ $article->content }}</p>
                        
                        @if($article->tags)
                        <h3>Tag</h3>
                        <p>{{ $article->tags }}</p>
                        @endif
                        
                    </div>
                    
                </div>
                
<div class="character-footer text-center mt-4">

    {{-- Pulsanti visibili solo all'autore --}}
    @auth
        @if (auth()->id() === $article->user_id)
            <a href="{{ route('articles.edit', $article) }}" class="show-button me-2">
                ✦ Modifica ✦
            </a>

            <form action="{{ route('articles.destroy', $article) }}"
                  method="POST"
                  onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?')"
                  style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="show-button show-button-danger">
                    ✦ Elimina ✦
                </button>
            </form>
        @endif
    @endauth

    {{-- Pulsante sempre visibile --}}
    <a href="{{ route('articles.index') }}" class="show-button ms-2">
        Torna agli articoli
    </a>

</div>
                
            </div>
            
        </div>
    </section>
    
</x-layout>