<?php
namespace App\traits;

use App\Models\Setting;


trait SettingTrait {

    public function getSettings(){
        $settings = Setting::all();
        $_settings =  $settings->flatMap(function ($setting) {
            return [$setting->key => $setting->value];
        });
        return $_settings;
    }
}
