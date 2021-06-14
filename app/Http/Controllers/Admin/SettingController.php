<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function store(Request $request)
    {
        
        $settings = $request->except('_token');
        foreach($settings as $name => $value){
            if (config()->has('settings.'.$name)) {
                $setting = Setting::where('name', $name)->first();
                $setting->value = $value;
                $setting->save();
            } else {
                Setting::create(
                    [ 
                        'name' => $name, 
                        'value' => $value 
                    ]
                );
            }
        }

        return redirect()->route('admin_settings')->with('flash_message', __('admin.Changes have been saved correctly'));
    }

}
