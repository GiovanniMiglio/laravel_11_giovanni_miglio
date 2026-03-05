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
                    <label class="form-label">Tag (separati da virgola)</label>
                    <input type="text" name="tags" class="form-control">
                </div>

                <button type="submit" class="map-button">
                    ✦ Salva Articolo ✦
                </button>

            </form>

        </div> 

    </div> 
</div>

</x-layout>