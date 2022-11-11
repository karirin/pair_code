<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DateTime;

class Message extends Model
{
    protected $table = 'messages';

    protected $guarded = array('id');

    public static $rules = array(
        'text' => 'required',
    );

    public $timestamps = false;

    //  作成時間を～前で表示する
    public function convert_to_fuzzy_time($time_db)
    {
        ini_set("date.timezone", "Asia/Tokyo");
        $unix = strtotime($time_db);
        $date = new DateTime();
        $date->modify('+9 hour');
        $now = strtotime($date->format('Y-m-d H:i:s'));
        $diff_sec = $now - $unix;
        if ($diff_sec < 60) {
            $time   = $diff_sec;
            $unit   = "秒前";
        } elseif ($diff_sec < 3600) {
            $time   = $diff_sec / 60;
            $unit   = "分前";
        } elseif ($diff_sec < 86400) {
            $time   = $diff_sec / 3600;
            $unit   = "時間前";
        } elseif ($diff_sec < 2764800) {
            $time   = $diff_sec / 86400;
            $unit   = "日前";
        } else {
            if (date("Y") != date("Y", $unix)) {
                $time   = date("Y年n月j日", $unix);
            } else {
                $time   = date("n月j日", $unix);
            }

            return $time;
        }

        return (int)$time . $unit;
    }
}