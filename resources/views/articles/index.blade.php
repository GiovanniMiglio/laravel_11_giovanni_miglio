<x-layout>

@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="bg-onepiece">
    <div class="container">
        <h2 class="text-center mb-4">Ultimi Articoli</h2>


        @if ($articles->isEmpty())
            <p class="text-center text-muted">
                Non ci sono ancora articoli. Presto arriveranno le prime recensioni e approfondimenti!
            </p>
        @else
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4 mb-4">
                        <x-article-card :article="$article" />
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>

</x-layout>