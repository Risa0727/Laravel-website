<?php
namespace App\Calendar;
use Carbon\Carbon;

Class CalendarView {
  private $carbon;

  function __construct($date){
		$this->carbon = new Carbon($date);
	}

  public function getTitle () {
    // dump(  $this->carbon);
    return $this->carbon->format('F, Y');

  }
  function render() {

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
  		$html[] = '</table>';
		$html[] = '</div>';

    return implode("", $html);
  }
}
