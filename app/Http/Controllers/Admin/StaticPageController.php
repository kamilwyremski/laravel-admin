<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function list()
    {

        $static_pages = StaticPage::orderBy('position', 'asc')
            ->Paginate(10);

        return view('admin.static_page.list', compact('static_pages'));
    }

    public function create()
    {
        return view('admin.static_page.add');
    }

    public function edit(StaticPage $StaticPage)
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

}
