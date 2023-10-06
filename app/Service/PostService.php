<?php

namespace App\Service;

use App\Models\Post;

class PostService {

    protected $posts;

    public function __construct(Post $post)
    {
        $this->posts = $post;
    }

    public function create($params)
    {
        try {
            $post = $this->posts::create($params);

            return $post;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
