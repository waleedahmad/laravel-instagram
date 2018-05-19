<?php

namespace App\Http\Controllers;

use App\Facades\Instagram;
use Illuminate\Http\Request;


class AppController extends Controller
{
    public function index()
    {
        return view('index')
            ->with('user', Instagram::getUser())
            ->with('posts', Instagram::getPosts());
    }

    public function search(Request $request){
        return view('search')
            ->with('posts', Instagram::getTagPosts($request->tag));
    }
}
