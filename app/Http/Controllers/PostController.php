<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Service\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function insert(CreatePostRequest $request)
    {
        $post = Post::create($request->validated());

        if ($post) {
            return redirect()->back()->with([
                'success' => 'create post success'
            ]);
        }

        return redirect()->back()->with([
            'fail' => 'create post fail'
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post, CreatePostRequest $request)
    {
        $check = $post->update($request->validated());

        if($check) {
            return redirect()->back()->with([
                'success' => 'Edit post success'
            ]);
        }

        return redirect()->back()->with([
            'fail' => 'Edit post fail'
        ]);
    }

    public function delete(Post $post)
    {
        $check = $post->delete();

        if($check) {
            return redirect()->back()->with([
                'success' => 'Deleted post success'
            ]);
        }

        return redirect()->back()->with([
            'fail' => 'Deleted post fail'
        ]);
    }

    public function store(CreatePostRequest $request)
    {
        // normal
        try {
            $post = Post::create($request->validated());

            if ($post) {
                return response()->json([
                    'data' => new PostResource($post),
                    // 'data' => $post,
                    'message' => 'create post success',
                    'code' => 200
                ]);
            }

            return response()->json([
                'message' => 'create post fail',
                'code' => 400
            ]);
    
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'create post fail',
                'code' => 400
            ]);
        }

        // service pattern
        $post = $this->postService->create($request->all());

        if ($post) {
            return response()->json([
                'data' => $post,
                'message' => 'create post success',
                'code' => 200
            ]);
        }

        return response()->json([
            'message' => 'create post fail',
            'code' => 400
        ]);
    }
}
