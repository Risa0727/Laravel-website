<?php
namespace App\Calendar;
use Carbon\Carbon;
use App\Models\Calendar\HolidaySetting;

Class CalendarView {
  private $carbon;

  function __construct($date){
		$this->carbon = new Carbon($date);
	}

  public function getTitle () {
    // dump(  $this->carbon);
    return $this->carbon->format('F, Y');

  }

  /**
  * Output a calendar
  */
  public function render() {
    $setting = HolidaySetting::firstOrNew();
    $setting->loadHoliday($this->carbon->format('Y'));

    $html = [];
    $html[] = '<div class="calendar">';
  		$html[] = '<table class="table">';
    		$html[] = '<thead>';
      		$html[] = '<tr>';
      		$html[] = '<th>Mon</th>';
      		$html[] = '<th>Tue</th>';
      		$html[] = '<th>Wed</th>';
      		$html[] = '<th>Thu</th>';
      		$html[] = '<th>Fri</th>';
      		$html[] = '<th>Sat</th>';
          $html[] = '<th style="color:red;">Sun</th>';
      		$html[] = '</tr>';
    		$html[] = '</thead>';


        $html[] = '<tbody>';

          $weeks = $this->getWeeks();
          foreach ($weeks as $week) {
            $html[] = '<tr class="' . $week->getClassName() . '">';
            $days = $week->getDays($setting);
            foreach ($days as $day) {
              $html[] = '<td class="' . $day->getClassName() . '">';
              $html[] = $day->render();
              $html[] = '</td>';
            }
            $html[] = '</tr>';
          }
        $html[] = '</tbody>';

  		$html[] = '</table>';
		$html[] = '</div>';

    return implode("", $html);
  }

  private function getWeeks() {
    $weeks = [];

    $firstDay = $this->carbon->copy()->firstOfMonth();
    $lastDay = $this->carbon->copy()->lastOfMonth();

    $week = new CalendarWeek($firstDay->copy());
    $weeks[] = $week;

    $tmpDay = $firstDay->copy()->addDay(7)->startofWeek();

    // 月末までループ
    // lte(): less than or equals(x <= y)
    while ($tmpDay->lte($lastDay)) {
      $week = new CalendarWeek($tmpDay, count($weeks));
      $weeks[] = $week;

      $tmpDay->addDay(7);
    }

    return $weeks;
  }



}
