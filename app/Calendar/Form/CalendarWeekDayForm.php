<?php
namespace App\Calendar\Form;

use Carbon\Carbon;
use App\Calendar\CalendarWeekDay;
use App\Models\Calendar\HolidaySetting;
use App\Models\Calendar\ExtraHoliday;

class CalendarWeekDayForm extends CalendarWeekDay {

  public $extraHoliday = null;

  function render() {

    $select_form_name = "extra_holiday["
      . $this->carbon->format('Ymd') . "][date_flag]";

    $comment_form_name = "extra_holiday["
      . $this->carbon->format("Ymd") . "][comment]";

    $defaultValue = ($this->isHoliday) ? "Close" : "Open";

    // 臨時休業が設定されているか
    $isSelectedExtraClose
      = ($this->extraHoliday && $this->extraHoliday->isClose()) ? "selected" : "";
    // 臨時営業が選択されているかどうか
    $isSelectedExtraOpen
      = ($this->extraHoliday && $this->extraHoliday->isOpen()) ? "selected" : "";

    $comment = ($this->extraHoliday) ? $this->extraHoliday->comment : "";

    $html = [];
    $html[] = '<p class="day">' . $this->carbon->format("j") . '</p>';
    $html[] = '<select name="' . $select_form_name . '" class="form-control">';
    $html[] = '<option value="0"> - (' . $defaultValue . ')</option>';
    $html[] = '<option value="' . ExtraHoliday::CLOSE .'" ' . $isSelectedExtraClose . '>Temporary Closed</option>';
    $html[] = '<option value="' . ExtraHoliday::OPEN .'" ' . $isSelectedExtraOpen . '>Temporary Open</option>';
    $html[] = '</select>';

    // comment
    if ($isSelectedExtraClose || $isSelectedExtraOpen) {
      $html[] = '<input class="form-control" type="text" name="' . $comment_form_name
        . '" value="' . e($comment) . '" />';
    }
    return implode('', $html);
  }

  function getClassName() {
    $classNames = ['day-' . strtolower($this->carbon->format('D'))];
    if ($this->extraHoliday) {
      if ($this->extraHoliday->isClose()) {
        $classNames[] = 'day-close';
      }
    } else if ($this->isHoliday) {
      $classNames[] = 'day-close';
    }
    return implode(' ', $classNames);
  }
}
