<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Models\Calendar\HolidaySetting;

class CalendarWeek {

  protected $carbon;
  protected $index = 0;

  function __construct($date, $index = 0) {
    $this->carbon = new Carbon($date);
    $this->index = $index;
  }

  function getClassName() {
    return "week-" . $this->index;
  }

  /**
   * @return CalendarWeekDay[]
   */
   function getDays(HolidaySetting $setting) {
     $days = [];

     $startDay = $this->carbon->copy()->startOfWeek();
     $lastDay = $this->carbon->copy()->endOfWeek();

     $tmpDay = $startDay->copy();

     // loop Mon to Sunday
     while($tmpDay->lte($lastDay)) {
       // last Month or Next month
       if ($tmpDay->month != $this->carbon->month) {
         $day = new CalendarWeekBlankDay($tmpDay->copy());
         $days[] = $day;
         $tmpDay->addDay(1);
         continue;
       }
       // This month
       $days[] = $this->getDay($tmpDay->copy(), $setting);
       $tmpDay->addDay(1);
     }

     return $days;
   }
   function getDay(Carbon $date, HolidaySetting $setting) {
     $day = new CalendarWeekDay($date);
     $day->checkHoliday($setting);

     return $day;
   }
}
