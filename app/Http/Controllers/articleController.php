<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;

class articleController extends Controller
{
    // Display a listing of the articles
    public function index()
    {
        $articles = Article::paginate(9);
        return view('browse', compact('articles'));
    }

    // Store a newly created article in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
            'image' => 'required|string',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $request->image,
        ]);

        return response()->json($article, 201);
    }

    // Display the specified article
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return response()->json($article);
    }

    // Update the specified article in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required',
            'author' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|required|string',
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());

        return response()->json($article);
    }

    // Remove the specified article from storage
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json(['message' => 'Article deleted successfully.']);
    }
}
