<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show(int $id, string $slug)
    {
        $blog = Blog::where('id', $id)->firstOrFail();

        if($blog->slug != $slug){
            return redirect()->route('blog_show', ['id'=>$blog->id, 'slug'=>$blog->slug]);
        }

        return view('blog.show', compact('blog'));
    }
}
