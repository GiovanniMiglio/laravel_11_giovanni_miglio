<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->orderBy('created_at', 'desc')->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', compact('tags'));
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
            'tags' => 'nullable|array',
            'new_tags' => 'nullable|string',
            'image_url' => 'nullable|string'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = '/storage/' . $request->file('image')->store('articles', 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'author' => $request->author,
            'image_url' => $imagePath,
            'excerpt' => $request->excerpt,
            'user_id' => auth()->id(),
        ]);

        $tags = $request->input('tags', []);

        if ($request->filled('new_tags')) {
            $newTags = array_map('trim', explode(',', $request->new_tags));
            foreach ($newTags as $tagName) {
                if ($tagName !== '') {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tags[] = $tag->id;
                }
            }
        }

        $article->tags()->sync($tags);

        return redirect()->route('articles.index')->with('success', 'Articolo creato con successo!');
    }

    public function show(Article $article)
    {
        $article->load('tags');
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        if ($article->user_id !== auth()->id()) {
            abort(403);
        }

        $tags = Tag::all();
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        if ($article->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'nullable|max:100',
            'author' => 'nullable|max:100',
            'image' => 'nullable|image|max:2048',
            'excerpt' => 'nullable|max:300',
            'tags' => 'nullable|array',
            'new_tags' => 'nullable|string',
            'image_url' => 'nullable|string'
        ]);

        $imagePath = $article->image_url;

        if ($request->hasFile('image')) {
            $imagePath = '/storage/' . $request->file('image')->store('articles', 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'author' => $request->author,
            'image_url' => $imagePath,
            'excerpt' => $request->excerpt,
        ]);

        $tags = $request->input('tags', []);

        if ($request->filled('new_tags')) {
            $newTags = array_map('trim', explode(',', $request->new_tags));
            foreach ($newTags as $tagName) {
                if ($tagName !== '') {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tags[] = $tag->id;
                }
            }
        }

        $article->tags()->sync($tags);

        return redirect()->route('articles.show', $article)->with('success', 'Articolo aggiornato!');
    }

    public function destroy(Article $article)
    {
        if ($article->user_id !== auth()->id()) {
            abort(403);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Articolo eliminato!');
    }
}
