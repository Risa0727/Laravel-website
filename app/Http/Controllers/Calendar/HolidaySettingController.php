<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calendar\HolidaySetting;

class HolidaySettingController extends Controller
{
    function form() {
      $setting = HolidaySetting::firstOrNew();

      // dd($setting);

      return view('calendar/holiday_setting_form', [
        'setting' => $setting,
        'FLAG_OPEN' => HolidaySetting::OPEN,
        'FLAG_CLOSE' => HolidaySetting::CLOSE
      ]);
    }

    function update(Request $resquest) {

      $setting = HolidaySetting::firstOrNew();
      $setting->update($resquest->all());

      return redirect()->action('App\Http\Controllers\Calendar\HolidaySettingController@form')
        ->withStatus('Saved.');
    }
}
