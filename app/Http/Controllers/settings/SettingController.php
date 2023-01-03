<?php

namespace App\Http\Controllers\settings;

use Exception;
use App\Models\Setting;
use App\traits\UploadImg;
use App\traits\SettingTrait;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    use UploadImg ;
    use SettingTrait ;
    public function index(){
        $settings = $this->getSettings();
        return view('settings.index')->with('settings', $settings);
    }

    public function update(Request $request,$name) {
        try{
            $settings = $request->except('_method','_token','logo');
            if($request->hasFile('logo')){
                $settings['logo'] = $this->uplodIgmage($request->file('logo'),'school-logo');
            }
            foreach($settings as $key => $value){
                Setting::where('key',$key)->update(['value'=>$value]);
            }
            notify()->success(trans('messages.submited'));
            return back();
        }
        catch(Exception $e){
            return back()->with('error','Error : '.$e->getMessage());
        }
    }
}
