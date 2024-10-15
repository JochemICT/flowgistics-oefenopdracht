<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view("articles.index")
            ->with("articles", $articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("articles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $article = new Article($data);
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);

        if(!$article){
            return redirect("/articles");
        }

        $article->load("batches");

        return view("articles.show")
            ->with("article", $article);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);

        if(!$article){
            return redirect("/articles");
        }

        return view("articles.edit")
            ->with("article", $article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $article = Article::find($id);


        if(!$article){
            return redirect("/articles");
        }
        $article->load("batches");

        //update article
        $article->update($data);

        return redirect(route("articles.show", $article->id));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);

        if(!$article){
            return redirect("/articles");
        }

        $article->delete();

        return redirect(route("articles.index"));


    }
}
