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
        return count($fileNum);
    }


}
