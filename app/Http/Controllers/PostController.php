<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            // 'title' => 'required|max:255',
            'body' => 'required',
        ]);

        dd($request->all());
    }
}
