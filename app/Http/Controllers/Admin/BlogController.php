<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list()
    {

        $blogs = Blog::orderBy('created_at', 'desc')
            ->Paginate(10);

        return view('admin.blog.list', compact('blogs'));
    }

    public function create(Blog $Blog = null)
    {
        return view('admin.blog.add', ['blog' => $Blog]);
    }

    public function store(Request $request, Blog $Blog = null)
    {
        if(!$Blog){
            $Blog = new Blog();
        }

        $request->validate([
            'name' => ['required'],
            'content' => [],
            'thumb' => [],
            'lid' => [],
            'description' => [],
            'keywords' => [],
        ]);
       
        $Blog->name = $request->name;
        $Blog->content = $request->content;
        $Blog->thumb = $request->thumb;
        $Blog->lid = $request->lid;
        $Blog->description = $request->description;
        $Blog->keywords = $request->keywords;
        $Blog->save();

        return redirect()->route('admin_blog_list')->with('flash_message', __('admin.Changes have been saved correctly'));
    }

    public function remove(Blog $Blog)
    {
        $Blog->delete();

        return back()->with('flash_message', __('admin.Successfully deleted'));
    }

}
