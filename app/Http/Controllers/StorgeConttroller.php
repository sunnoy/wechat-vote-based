<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\voteSendEmail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;


class StorgeConttroller extends Controller
{
    public function SaveFile()
    {

        //service cron reload
        exec("cd /var/www/we/storage/app/vote && zip -r ShuiZhiJianCeZhongXin.zip ./*");
    }

    public function sendEmail()
    {

        Mail::to('1476281924@qq.com')->send(new voteSendEmail());

    }

    public function deleteFile()
    {
        exec("cd /var/www/we/storage/app/vote && rm -rf *");

    }

    public function test(){
        $fileNum = Storage::disk('vote')->files();
        $num = 190;
        $append = '';
        if ($num >= 10 && $num <= 100) {
            $append = "没有投票的要抓紧喔";
        } elseif ($num > 180) {
            $append = "好给力！";
        }

        if (date("Hi") > 1305) {
            $num = $num - 1;
        }
        echo $notice = "嗨 ！ 今天我们水质检测中心一共投" . $num . "张票," . $append;

    }


}
