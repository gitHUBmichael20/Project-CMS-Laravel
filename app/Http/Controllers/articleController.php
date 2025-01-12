<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class articleController extends Controller
{

    public function index()
    {
        $articles = Article::paginate(9);
        return view('browse', compact('articles'));
    }

    public function managePost(Request $request)
    {

        $search = $request->get('search');
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');


        $articles = Article::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
        })
            ->orderBy($sortBy, $sortOrder)
            ->paginate(10);
        return view('admin.dashboard', compact('articles'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'caption' => 'required|string',
            'author' => 'required|string|max:255',
        ]);


        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('images', 'public');
        } else {

            return back()->withErrors(['image' => 'Image is required.']);
        }


        Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('caption'),
            'image' => $imagePath,
            'author' => $request->input('author'),
        ]);


        return back()->with('success', 'Article uploaded successfully!');
    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('section.articles', ['article' => $article]);
    }


    public function update(Request $request)
    {
        // Log the incoming request data
        Log::info($request->all());  // Log the request data

        // Validate the incoming request data
        $request->validate([
            'id' => 'required|exists:article,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        // Find the article by ID
        $article = Article::findOrFail($request->id);

        // Update the article fields
        $article->title = $request->title;
        $article->content = $request->content;
        $article->author = $request->author;

        // Save the updated article
        $article->save();

        // Redirect or return response
        return redirect('/admin/dashboard')->with('success', 'Article updated successfully');
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('success', 'Article deleted successfully!');
    }
}
