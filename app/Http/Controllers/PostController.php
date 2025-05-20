<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:2',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webm|max:2048'
        ]);

        if ($request->image) {
            $file_name = time() . '.' . $request->image->extension();

            $request->image->move(public_path('storage/images'), $file_name);

            $validated['image'] = $file_name;
        }

        Post::create($validated);

        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|min:2',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webm|max:2048'
        ]);

        if ($request->image) {
            if($post->image) {
                $file_path = "storage/images/{$post->image}";

                if(File::exists($file_path)) {
                    File::delete($file_path);
                }
            }

            $file_name = time() . '.' . $request->image->extension();

            $request->image->move(public_path('storage/images'), $file_name);

            $validated['image'] = $file_name;
        }

        $post->update($validated);

        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        if($post->image) {
            $file_path = "storage/images/{$post->image}";

            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }

        $post->delete();

        return redirect()->route('admin');
    }

    public function toggleFeatured(string $id)
    {
        $post = Post::findOrFail($id);

        if($post->is_featured) {
            $post->update(['is_featured' => false]);
        } else {
            $post->update(['is_featured' => true]);
        }

        return redirect()->route('admin');
    }
}
