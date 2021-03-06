<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Calendar\CalendarView;
use App\Calendar\Output\CalendarOutputView;

class CalendarController extends Controller
{
    public function show (Request $request) {
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

      $calendar = new CalendarOutputView($date);
      // dd($calendar);
      // dd(date("Y/m/d",$date));
        // $calendar = new CalendarOutputView(time());
      // $calendar = new CalendarView(mktime(-400));


      return view('calendar.index', [
        'calendar' => $calendar
      ]);
    }
}
