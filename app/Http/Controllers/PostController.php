<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
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

    public function store(CreatePostRequest $request)
    {
        // normal
        try {
            $post = Post::create($request->all());

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
