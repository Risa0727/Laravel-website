<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendar\Form\CalendarFormView;
use App\Models\Calendar\ExtraHoliday;

class ExtraHolidaySettingController extends Controller
{
    public function form(Request $request) {
      $date = $request->input("date");
      if($date && preg_match("/^[0-9]{4}-[0-9]{2}$/", $date)) {
        //  ($date . "-01"): 月初め
        $date = strtotime($date . "-02");
              // dd(date("Y/m/d",$date));
      } else {
        $date = null;
      }

      // set this month if it can't get a correct date
      if(!$date) $date = time();

      $calendar = new CalendarFormView($date);

      return view('calendar/extra_holiday_setting_form', [
        'calendar' => $calendar
      ]);
    }
    public function update(Request $request) {

      $input = $request->get("extra_holiday");
      $ym = $request->input("ym");
      $date = $request->input("date");

      ExtraHoliday::updateExtraHolidayWithMonth($ym, $input);

      return redirect()
        ->action('App\Http\Controllers\Calendar\ExtraHolidaySettingController@form'
                , ["date" => $date])
        ->withStatus('Extra holiday settings have been saved.');
    }
}
