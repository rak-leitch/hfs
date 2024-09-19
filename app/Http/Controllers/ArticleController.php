<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller implements HasMiddleware
{    
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }
    
    /**
     * Display a listing of the article.
     */
    public function index(): View
    {
        $articles = Article::with('user:id,name')->get();
        return ViewFacade::make('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new article.
     */
    public function create(): View
    {
        return ViewFacade::make('articles.create');
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $article = new Article;
        $article->fill($request->validated());
        $article->user_id = $request->user()->id;
        $article->save();

        return Redirect::route('articles.create')->with('status', 'article-created');
    }

    /**
     * Display the specified article.
     */
    public function show(Article $article): void
    {
        //TODO
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Article $article): void
    {
        //TODO
    }

    /**
     * Update the specified article in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article): void
    {
        //TODO
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        Gate::authorize('forceDelete', $article);
        $article->delete();
        return Redirect::back();
    }
}
