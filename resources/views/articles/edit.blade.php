<x-layout>

<div class="container-fluid section-articles">
    <div class="treasure-map-form mx-auto">

        <h2 class="map-title text-center mb-4">Modifica Articolo</h2>

        <div class="form-overlay">

            <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="map-group mb-4">
                    <label for="title" class="map-label">Titolo</label>
                    <input type="text" name="title" id="title" class="map-input" value="{{ old('title', $article->title) }}" required>
                </div>

                <div class="map-group mb-4">
                    <label for="content" class="map-label">Contenuto</label>
                    <textarea name="content" id="content" rows="6" class="map-textarea" required>{{ old('content', $article->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoria</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category', $article->category) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Autore</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $article->author) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Carica nuova immagine (opzionale)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Oppure URL immagine</label>
                    <input type="text" name="image_url" class="form-control" value="{{ old('image_url', $article->image_url) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrizione breve</label>
                    <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $article->excerpt) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tag (separati da virgola)</label>
                    <input type="text" name="tags" class="form-control" value="{{ old('tags', $article->tags) }}">
                </div>

                <button type="submit" class="map-button">
                    ✦ Salva Modifiche ✦
                </button>

            </form>

        </div>

    </div>
</div>

</x-layout>