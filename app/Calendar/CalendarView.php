<?php
namespace App\Calendar;
use Carbon\Carbon;
use App\Models\Calendar\HolidaySetting;
use App\Models\Calendar\ExtraHoliday;

Class CalendarView {
  protected $carbon;
  protected $holidays = [];

  function __construct($date){
		$this->carbon = new Carbon($date);
	}

  public function getTitle () {
    // dump(  $this->carbon);
    return $this->carbon->format('F, Y');

  }
  /**
   * Get Next month
   */
   public function getNextMonth() {
     return $this->carbon->copy()->addMonthsNoOverflow()->format('Y-m');
   }
  /**
   * Get Previous month
   */
   public function getPreviousMonth() {
     return $this->carbon->copy()->subMonthsNoOverflow()->format('Y-m');
   }
  /**
  * Output a calendar
  */
  public function render() {
    $setting = HolidaySetting::firstOrNew();
    $setting->loadHoliday($this->carbon->format('Y'));
    // 臨時休業
    $this->holidays = ExtraHoliday::getExtraHolidayWithMonth($this->carbon->format("Ym"));

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
            // foreach ($days as $day) {
            //   $html[] = '<td class="' . $day->getClassName() . '">';
            //   $html[] = $day->render();
            //   $html[] = '</td>';
            // }
            foreach ($days as $day) {
              $html[] = $this->renderDay($day);
            }
            $html[] = '</tr>';
          }
        $html[] = '</tbody>';

  		$html[] = '</table>';
		$html[] = '</div>';

    return implode("", $html);
  }
  /**
  * Display day
  */
  protected function renderDay(CalendarWeekDay $day) {
    $html = [];
    $html[] = '<td class="' . $day->getClassName() . '">';
    $html[] = $day->render();
    $html[] = '</td>';

    return implode("", $html);
  }

  protected function getWeeks() {
    $weeks = [];

    $firstDay = $this->carbon->copy()->firstOfMonth();
    $lastDay = $this->carbon->copy()->lastOfMonth();

    // 1st week
    $weeks[] = $this->getWeek($firstDay->copy());

    $tmpDay = $firstDay->copy()->addDay(7)->startofWeek();

    // 月末までループ
    // lte(): less than or equals(x <= y)
    while ($tmpDay->lte($lastDay)) {

      $weeks[] = $this->getWeek($tmpDay->copy(), count($weeks));

      $tmpDay->addDay(7);
    }

    return $weeks;
  }

  protected function getWeek(Carbon $date, $index=0) {
    return new CalendarWeek($date, $index);
  }

}
