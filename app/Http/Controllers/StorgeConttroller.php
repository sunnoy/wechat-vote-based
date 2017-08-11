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

    public function test()
    {
//        $fileNum = Storage::disk('vote')->files();
//        $num = 190;
//        $append = '';
//        if ($num >= 10 && $num <= 100) {
//            $append = "没有投票的要抓紧喔";
//        } elseif ($num > 180) {
//            $append = "好给力！";
//        }
//
//        if (date("Hi") > 1305) {
//            $num = $num - 1;
//        }
//        echo $notice = "嗨 ！ 今天我们水质检测中心一共投" . $num . "张票," . $append;

        $urlcon = "我想";
//                    //发送到图灵机器人接口
//
//                    $url = "http://www.tuling123.com/openapi/api?key=f7b6e44c70ea46f3972d95e7bd044789&info=" . $content;
//                    //获取图灵机器人返回的内容
//                    $content = file_get_contents($url);
//                    //对内容json解码
//                    $content = json_decode($content);
////                    //把内容发给用户
//        $client = new Client(); //GuzzleHttp\Client
//        $result = $client->request('POST', 'http://www.tuling123.com/openapi/api', [
//            'form_params' => [
//                'key' => 'f7b6e44c70ea46f3972d95e7bd044789',
//                'info' => $urlcon,
//                'userid' => "123",
//            ]
//        ]);
//        $content = $result->getBody()->getContents();
//
//        $content = json_decode($content);
//
//        $text = $content->text;
//        if (!empty($content->url)) {
//
//            $urll = $content->url;
//        };
//
//        if (!empty($content->list)) {
//            $list = $content->list;
//        }
//
//        $tuling = $text;
//        if (!empty($urll)) {
//
//            $tuling = $text . $urll;
//
//        } elseif (!empty($list)) {
//
//            $tuling = $text . $list;
//
//        } elseif (!empty($urll) && !empty($list)) {
//
//            $tuling = $text . $urll . $list;
//
//        }
//
//        echo $tuling ;
        date_default_timezone_set("Asia/Shanghai");

        if (date("Hi")>=0000 && intval(date("Hi"))<=1033){
            echo "toupiao shi jian";

        }else{
            echo "fei tou piao shi jian";
        }
        //return date("Hi");

    }


}
