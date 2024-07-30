<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function __construct()
    {
        Paginator::useBootstrapFive();
    }

    public function index()
    {
        $featured = Post::where('is_featured', true)->first();

        $posts = Post::when(request('category_id'), function($query) {
            $query->where('category_id', request('category_id'));
        })->where('is_featured', false)->latest()->paginate(6)->withQueryString();

        $categories = Category::all();

        return view('index', compact('featured', 'posts', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $results = Post::where('title', 'like', "%$query%")->latest()->paginate(6)->withQueryString();

        $categories = Category::all();

        return view('index', compact('results', 'categories'));
    }

    public function post($post)
    {
        $post = Post::findOrFail($post);

        return view('post', ['post' => $post]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
