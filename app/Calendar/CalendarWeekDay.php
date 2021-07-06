<?php

namespace App\Calendar;
use Carbon\Carbon;
use App\Models\Calendar\HolidaySetting;

class CalendarWeekDay {
  protected $carbon;
  protected $isHoliday = false;

  function __construct($date) {
    $this->carbon = new Carbon($date);
  }

  function getClassName() {
    $classNames = [ 'day-' . strtolower($this->carbon->format('D'))];

    if ($this->isHoliday) {
      $classNames[] = "day-close";
    }
    return implode(" ", $classNames);
  }

  /**
  * @return
  */
  function render() {
    return '<p class="day">' . $this->carbon->format("j") . '</p>';
  }
  /**
  * Judge if holiday or not
  */
  function checkHoliday(HolidaySetting $setting) {
    if ($this->carbon->isMonday() && $setting->isCloseMonday()) {
      $this->isHoliday = true;
    }
    else if($this->carbon->isTuesday() && $setting->isCloseTuesday()){
      $this->isHoliday = true;
    }
    else if($this->carbon->isWednesday() && $setting->isCloseWednesday()){
      $this->isHoliday = true;
    }
    else if($this->carbon->isThursday() && $setting->isCloseThursday()){
      $this->isHoliday = true;
    }
    else if($this->carbon->isFriday() && $setting->isCloseFriday()){
      $this->isHoliday = true;
    }
    else if($this->carbon->isSaturday() && $setting->isCloseSaturday()){
      $this->isHoliday = true;
    }
    else if($this->carbon->isSunday() && $setting->isCloseSunday()){
      $this->isHoliday = true;
    }

    if ($setting->isCloseHoliday() && $setting->isHoliday($this->carbon)) {
      $this->isHoliday = true;
    }
  }


}
