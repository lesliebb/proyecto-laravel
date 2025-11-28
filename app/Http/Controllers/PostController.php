<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:ver posts', ['only' => ['index', 'show']]),
            new Middleware('permission:crear posts', ['only' => ['create', 'store']]),
            new Middleware('permission:editar posts', ['only' => ['edit', 'update']]),
            new Middleware('permission:eliminar posts', ['only' => ['destroy']]),
        ];
    }

    public function index()
    {
        $posts = Post::with('category')->paginate(10);
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }
    public function store(StorePostRequest $request)
    {
       Post::create($request->validated());
        return redirect()->route('posts.index');
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('posts.index');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}