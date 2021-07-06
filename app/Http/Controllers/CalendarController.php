<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar\CalendarView;

class CalendarController extends Controller
{
    public function show () {
      $calendar = new CalendarView(time());
      // $calendar = new CalendarView(mktime(-400));

      return view('calendar.index', [
        'calendar' => $calendar
      ]);
    }
}
