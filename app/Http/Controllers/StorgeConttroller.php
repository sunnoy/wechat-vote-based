<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\voteSendEmail;



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
        date_default_timezone_set("Asia/Shanghai");

        if (intval(date('H')) <= 13) {


            if ("3") {
                echo intval(date("H"));
                return "Congratulations ! image saved success ! ";


            }

        } else {
            echo intval(date("H"));


            return "Whoops ! time is not";
        }
    }


}
