<?php
namespace App\Calendar\Output;

use Carbon\Carbon;
use App\Calendar\CalendarView;
use App\Calendar\CalendarWeekDay;

class CalendarOutputView extends CalendarView {

  protected function renderDay(CalendarWeekDay $day) {

    $html = [];
    $extraHoliday = null;

    if (isset($this->holidays[$day->getDateKey()])) {
      $extraHoliday = $this->holidays[$day->getDateKey()];
      if ($extraHoliday->isOpen()) {
        $day->setHoliday(false);
      } else if($extraHoliday->isClose()) {
        $day->setHoliday(true);
      }
    }
    $html[] = '<td class="' . $day->getClassName() . '">';
    $html[] = $day->render();

    if ($extraHoliday) {
      $html[] = '<p class="comment">' . e($extraHoliday->comment) . '</p>';
    }

    $html[] = '</td>';

    return implode("", $html);
  }

}
