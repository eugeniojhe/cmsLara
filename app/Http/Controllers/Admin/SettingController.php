<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Setting;
use Illuminate\Support\Facades\Validator; 

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    {
        $settings = array();
        $dbsettings = Setting::all();
        foreach($dbsettings as $setting){
            $settings[$setting['name']] =  $setting['content']; 
        }
        return view('Admin.settings.index',[
            'settings' => $settings 
        ]); 
    }

    public function save(Request $request)
    {
        $data = $request->only(['title','subtitle','email','bgcolor','textcolor']);
        $validator = $this->validator($data); 
        if ($validator->fails()){
            return redirect()->route('settings')
                ->withErrors($validador)
                ->withInput(); 
        }
        foreach($data as $field => $value){
            echo "Field => ".$field." Content ".$value."<br>"; 
            Setting::where('name',$field)->update(['content' => $value]);
        }
        return redirect()->route('settings')
               ->with('warning', 'Successful Saving'); 
    }

    protected function validator($data)
    {
        return Validator::make($data,[
            'title' =>['string','max:100'],
            'subtitle' => ['string','max:100'],
            'email' => ['string','email'],
            'bgcolor' => ['string','regex:/#[A-Z0-9]{6}/i'],
            'textcolor' => ['string','regex:/#[A-Z0-9]{6}/i']            
        ]);
    }
}
