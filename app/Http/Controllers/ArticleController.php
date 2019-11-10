<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\ArticleRequest;
use Cache;
class ArticleController extends Controller
{
    
    public function __construct(){
        $this->allowfunctions('article',true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        event(new \App\Events\ArticleEvent(
           'Ingresa a ver artículos'
        ));

        return view('articles.index')->with(
            [
'articles'=>Article::with('user')
->where('name','like',"%".request()->get('filter')."%")
                         ->paginate(1)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         return view('articles.create')->with([
            'users'=>
                    Cache::remember('user_cmb',20,function(){
                        User::pluck('name','id')->toArray();
                    })
               
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->validated());
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
         return view('articles.show')->with([
            'article'=>$article
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
         return view('articles.edit')->with([
            'article'=>$article,
            'users'=>User::pluck('name','id')->toArray()
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->validated());
        $article->save();
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
       $article->delete();
       return redirect()->route('articles.index');
    }
}