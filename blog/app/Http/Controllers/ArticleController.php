<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }
 
    public function show($id)
    {
        return Article::find($id)->body;
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }

    public function test()
    {
    	 $article = Article2::findOrFail($id);
        $article->delete();
    	return "REZZA";
    }
}
