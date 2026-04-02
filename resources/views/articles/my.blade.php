<x-layout>
    <h1>I miei articoli</h1>

    @foreach ($articles as $article)
        <x-article-card :article="$article" />
    @endforeach
</x-layout>
