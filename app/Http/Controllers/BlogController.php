<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    function index()
    {
        $Blogs=Blog::orderByDesc('id')->where('status', true)->get();

        return view('welcome', compact('Blogs'));
    }

    function detail($id)
    {
        $Blog = Blog::find($id);
        return view('detail', compact('Blog'));
    }
}
