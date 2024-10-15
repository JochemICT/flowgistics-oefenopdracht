<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);

        if(!$article) {
            return response()->json(["message" => "Article not found."], 404);
        }

        $article->load("batches");

        return response()->json($article);

    }
}
