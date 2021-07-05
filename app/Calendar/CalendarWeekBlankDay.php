<?php
namespace App\Calendar;

/**
* To create and output blank spaces
*/
class CalendarWeekBlankDay extends CalendarWeekDay {

  function getClassName() {
    return "day-blank";
  }

  function render() {
    return '';
  }

}
