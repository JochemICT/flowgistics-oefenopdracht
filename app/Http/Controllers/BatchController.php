<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = Article::all();

        $query = Batch::query();

        if($request->has("article_id") && $request->get("article_id") != "-1"){
            $query->where("article_id", $request->get("article_id"));
        }

        $batches = $query->paginate(10);

        return view('batches.index')
            ->with('batches', $batches)
            ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $articles = Article::all();

        return view('batches.create')
            ->with('articles', $articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $batch = new Batch($data);
        $batch->save();

        return redirect()->route('batches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batch = Batch::find($id);

        if(!$batch){
            return redirect(route('batches.index'));
        }

        $batch->load("article");

        return view('batches.show')
            ->with('batch', $batch);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batch = Batch::find($id);

        if(!$batch){
            return redirect(route('batches.index'));
        }

        $batch->load("article");

        return view('batches.edit')
            ->with('batch', $batch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
