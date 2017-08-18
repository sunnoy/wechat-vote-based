<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Text;
use Illuminate\Http\Request;

class TimeBucketController extends Controller
{


    public function TimeBucker()
    {

        $sec = 1;
        $min = $sec * 60;
        $hou = $min * 60;
        $day = $hou * 24;
        $moth = $day * 30;
        $year = $moth * 12;

        echo 'nian ' . $year . '<br/>' . 'moth ' . $moth . '<br/>' . 'day ' . $day . '<br/>' . 'hour ' . $hou . '<br/>' . 'fen ' . $min;


        echo '<br/>';
        echo '<br/>';

        echo 'now is  ' . date('Y-m-d');
        echo '<br/>';

        echo date('Y-m-d',strtotime('+1 month'));



    }
}
