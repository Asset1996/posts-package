<?php

namespace Asset1996\Posts\Http\Controllers;

use Asset1996\Posts\Models\PostModel;

class PostController extends Controller
{
    public function index(){
        $posts = PostModel::all();
        return view('posts::index', [
            'posts' => $posts
        ]);
    }
}
