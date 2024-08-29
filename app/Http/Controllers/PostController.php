<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->paginate(5);

        return view('posts.index', compact('posts'));
    }


    public function search(Request $request)
    {

        $query = $request->input('query');


        $posts = Post::where('title', 'like', "%$query%")
            ->orWhere('content', 'like', "%$query%")
            ->paginate(5);

        return response()->json([
            'data' => $posts->items(),
            'pagination' => [
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
            ]
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostStoreRequest $request)
    {
        $validatedData = $request->validated();

        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('media', 'public');
        }

        // dd($this->getPostData($validatedData,$request,$mediaPath));

        Post::create($this->getPostData($validatedData, $request, $mediaPath));

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        // dd($post);
        return view('posts.edit', compact('post'));
    }

    public function update(PostStoreRequest $request, Post $post)
    {

        $validatedData = $request->validated();

        $mediaPath = null;

        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('media', 'public');
        }

        $post->update(
            $this->getPostData($validatedData, $request, $mediaPath),
        );

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        dd($post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }


    private function getPostData($validatedData, $request, $mediaPath)
    {
        return [
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'media_type' => $request->file('media')->extension(),
            'media_path' => $mediaPath,
            'user_id' => Auth::id(),
            'category' => $validatedData['category'],
        ];
    }
}
