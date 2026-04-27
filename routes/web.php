<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::middleware(['auth'])->group(function () {

    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');

    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    Route::get('/my-articles', function () {
        $articles = \App\Models\Article::with('tags')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('articles.my', compact('articles'));
    })->name('my-articles');
});

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
