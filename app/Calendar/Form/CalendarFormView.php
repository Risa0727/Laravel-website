<?php
namespace App\Calendar\Form;

use Carbon\Carbon;
use App\Calendar\CalendarView;
use App\Models\Calendar\ExtraHoliday;

class CalendarFormView extends CalendarView {

    protected function getWeek(Carbon $date, $index = 0) {
      $week = new CalendarWeekForm($date, $index);

      // 臨時休業
      $start = $date->copy()->startOfWeek()->format("Ymd");
      $end = $date->copy()->endOfWeek()->format("Ymd");

      $week->holidays = $this->holidays->filter(function($value, $key) use($start, $end) {
        return $key >= $start && $key <= $end;
      })->keyBy("date_key");

      return $week;
    }
}
