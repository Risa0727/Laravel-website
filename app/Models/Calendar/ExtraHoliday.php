<?php

namespace App\Models\Calendar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraHoliday extends Model
{
    use HasFactory;

    const OPEN = 1;
    const CLOSE = 2;
    protected $table = "extra_holiday";
    protected $fillable = [
      // 'date_key',
      'date_flag',
      'comment'
    ];

    function isClose() {
      return $this->date_flag == ExtraHoliday::CLOSE;
    }
    function isOpen() {
      return $this->date_flag == ExtraHoliday::OPEN;
    }

    public static function getExtraHolidayWithMonth($ym) {
      return ExtraHoliday::where("date_key", "like", $ym . "%")
        ->get()->keyBy("date_key");
        // eg. 'date_key' => ["date_flag" => "1", 'comment' => "hogehoge"]
    }

    public static function updateExtraHolidayWithMonth($ym, $input) {

      $extraHolidays = self::getExtraHolidayWithMonth($ym);
      foreach($input as $date_key => $array) {
        // すでに作成済みの場合、
        if (isset($extraHolidays[$date_key])) {

          $extraHoliday = $extraHolidays[$date_key];
          // dd($extraHolidays);
          $extraHoliday->fill($array);

          // CloseかOpen指定の場合は上書き
          if ($extraHoliday->isClose() || $extraHoliday->isOpen()) {
              $extraHoliday->save();

          // 指定なしを選択している場合は削除 = reset
          } else {
            $extraHoliday->delete();
          }
          continue;
        }
        $extraHoliday = new ExtraHoliday();
        $extraHoliday->date_key = $date_key;

        $extraHoliday->fill($array);

        //CloseかOpen指定の場合は保存
        if($extraHoliday->isClose() || $extraHoliday->isOpen()){
          $extraHoliday->save();
        }

      }
    }
}
