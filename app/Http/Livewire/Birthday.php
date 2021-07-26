<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Birthday extends Component
{
    public $year = 0;
    public $month = 0;
    public $day = 0;
    public $age= -1;
    public $last_day_of_month = 0;

    public function mount($year=0, $month=0, $day=0) {
      $this->year = $year;
      $this->month = $month;
      $this->day = $day;
      $this->onChange();
    }

    public function onChange() {
      $year = intval($this->year);
      $month = intval($this->month);
      $day = intval($this->day);

      // 月の最終日取得
      if($year > 0 && $month > 0) {
        $this->last_day_of_month
          = Carbon::create($this->year, $this->month)->endOfMonth()->day;

        if (checkdate($month, $day, $year)) {
          $this->age = Carbon::createFromDate($this->year, $this->month, $this->day)->age;
        } else {
          $this->age = -1;
        }
      }
    }

    public function render()
    {
        return view('livewire.birthday')
          ->extends('livewire.template');
    }
}
