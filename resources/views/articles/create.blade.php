<x-layout>
    
    <div class="container-fluid section-articles">
        <div class="treasure-map-form mx-auto">
            
            <h2 class="map-title text-center mb-4">Crea un nuovo Articolo</h2>
            
            <div class="form-overlay">
                
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="map-group mb-4">
                        <label for="title" class="map-label">Titolo</label>
                        <input type="text" name="title" id="title" class="map-input" required>
                    </div>
                    
                    <div class="map-group mb-4">
                        <label for="content" class="map-label">Contenuto</label>
                        <textarea name="content" id="content" rows="6" class="map-textarea" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <input type="text" name="category" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Autore</label>
                        <input type="text" name="author" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Carica immagine</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Oppure URL immagine</label>
                        <input type="text" name="image_url" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Descrizione breve</label>
                        <textarea name="excerpt" class="form-control" rows="2"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Tag:</label>
                        
                        <div style="border: 1px solid #ccc; border-radius: 6px; padding: 10px;">
                            
                            <button type="button" 
                            onclick="document.getElementById('tag-box').classList.toggle('d-none')" 
                            style="width: 100%; background: #eee; border: none; padding: 10px; border-radius: 4px; cursor: pointer;">
                            Seleziona Tag ▼
                        </button>
                        
                        <div id="tag-box" class="d-none mt-3">
                            <div class="d-flex flex-wrap gap-3">
                                @foreach ($tags as $tag)
                                <label class="d-flex align-items-center" style="gap: 6px;">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="new_tags">Aggiungi nuovi tag (separati da virgola)</label>
                    <input type="text" name="new_tags" id="new_tags" class="form-control" placeholder="es: Fantasy, Shonen, Mecha">
                </div>
                
                <button type="submit" class="map-button">
                    ✦ Salva Articolo ✦
                </button>
                
            </form>
            
        </div> 
        
    </div> 
</div>

</x-layout>
