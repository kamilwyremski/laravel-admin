<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function list()
    {
        $static_pages = StaticPage::orderBy('position', 'asc')->get();

        return view('admin.static_page.list', compact('static_pages'));
    }

    public function create(StaticPage $StaticPage = null)
    {
        return view('admin.static_page.add', ['static_page' => $StaticPage]);
    }

    public function store(Request $request, StaticPage $StaticPage = null)
    {
        if(!$StaticPage){
            $StaticPage = new StaticPage();
        }

        $request->validate([
            'name' => ['required','unique:static_pages,name,'.$StaticPage->id],
            'content' => [],
        ]);
       
        $StaticPage->name = $request->name;
        $StaticPage->content = $request->content;
        $StaticPage->save();

        return redirect()->route('admin_static_page_list')->with('flash_message', __('admin.Changes have been saved correctly'));
    }

    public function remove(StaticPage $StaticPage)
    {
        $StaticPage->delete();

        return back()->with('flash_message', __('admin.Successfully deleted'));
    }

    public function positions(Request $request)
    {
        $position = 0;
        foreach($request->ids as $id){
            $static_page = StaticPage::where('id', $id)->firstOrFail();
            $static_page->position = $position;
            $static_page->save();
            $position++;
        }

        return back()->with('flash_message', __('admin.Changes have been saved correctly'));
    }

}
