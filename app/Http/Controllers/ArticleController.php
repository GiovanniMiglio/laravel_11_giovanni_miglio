<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'nullable|max:100',
            'author' => 'nullable|max:100',
            'image' => 'nullable|image|max:2048',
            'excerpt' => 'nullable|max:300',
            'tags' => 'nullable|max:255',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'author' => $request->author,
            'image_url' => $imagePath ? '/storage/' . $imagePath : $request->image_url,
            'excerpt' => $request->excerpt,
            'tags' => $request->tags,
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Articolo creato con successo!');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
public function edit(Article $article)
{
    if ($article->user_id !== auth()->id()) {
        abort(403, 'Non sei autorizzato a modificare questo articolo.');
    }

    return view('articles.edit', compact('article'));
}
public function update(Request $request, Article $article)
{
    if ($article->user_id !== auth()->id()) {
        abort(403, 'Non sei autorizzato a modificare questo articolo.');
    }

    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'category' => 'nullable|max:100',
        'author' => 'nullable|max:100',
        'image' => 'nullable|image|max:2048',
        'excerpt' => 'nullable|max:300',
        'tags' => 'nullable|max:255',
    ]);

    $imagePath = $article->image_url;

    if ($request->hasFile('image')) {
        $imagePath = '/storage/' . $request->file('image')->store('articles', 'public');
    }

    $article->update([
        'title' => $request->title,
        'content' => $request->content,
        'category' => $request->category,
        'author' => $request->author,
        'image_url' => $imagePath,
        'excerpt' => $request->excerpt,
        'tags' => $request->tags,
    ]);

    return redirect()->route('articles.show', $article)->with('success', 'Articolo aggiornato!');
}
public function destroy(Article $article)
{
    if ($article->user_id !== auth()->id()) {
        abort(403, 'Non sei autorizzato a eliminare questo articolo.');
    }

    $article->delete();

    return redirect()->route('articles.index')->with('success', 'Articolo eliminato!');
}
}