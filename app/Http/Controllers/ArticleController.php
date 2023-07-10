<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;
use Flash;

class ArticleController extends Controller
{
   

    /**
     * Display a listing of the Article.
     */
    public function showArticels()
    {
            $articles = Article::join('users', 'articles.user_id', '=', 'users.id')
                            ->select('articles.*', 'users.name as user_name')
                        ->paginate(10);
        
        return view('articles.index', compact('articles'));
    }
    public function create()
    {
       $users = User::all();
        return view('articles.create',compact('users'));
       
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required|exists:users,id',
        ]); 
        
    
        $article = Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id'),
        ]);
        return redirect()->route('articles.index');
    }
    
    public function edit($id)
    {
       
        $article = Article::findOrFail($id);
        $users = User::pluck('name', 'id');
        
        
        return view('articles.edit', compact('article','users'));
    }
    
    public function update(Request $request,  $id)
    {
        $article = Article::findOrFail($id);

        $data = $request->only(['title', 'content', 'user_id']);
    
        
        $article->update($data);
    
    
        
    
        $article->update($request->all());
        return redirect()->route('articles.index');
    }
    
    public function show(Article $article)
    {
        $article->load('user');
        return view('articles.show', compact('article'));
    }
    
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
    public function showFront()
    {
    
        $articles = Article::join('users', 'articles.user_id', '=', 'users.id')
        ->select('articles.*', 'users.name as user_name')
    ->paginate(10);

return view('layouts.front', compact('articles'));

    }
}
