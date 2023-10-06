<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(CreatePostRequest $request)
    {
        dd($request->all());
    }
}
