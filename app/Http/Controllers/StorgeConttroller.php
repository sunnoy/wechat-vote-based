<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class StorgeConttroller extends Controller
{
    public function SaveFile()
    {
        $url ="http://mmbiz.qpic.cn/mmbiz_jpg/WxulJpJqk5MIRrkiaCS0QKb7sZllwZFvsqFpMcIZ8I7aOZWM9icd4rZyIQKuwibgqJzte0NXibvwGI4Ou2ibeu0UEDw/0";


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);

        $file = curl_exec($ch);

        curl_close($ch);



        $fileSave = Storage::disk('vote')->put(date("m-d-h-i-s") . ".jpg", $file);
        if ($fileSave) {
            return "Congratulations ! image saved success ! ";
        }
    }
}
