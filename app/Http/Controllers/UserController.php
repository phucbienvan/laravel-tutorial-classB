<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return 'this is index';
    }

    public function show($id)
    {
        return 'user id is ' . $id;
    }
}
