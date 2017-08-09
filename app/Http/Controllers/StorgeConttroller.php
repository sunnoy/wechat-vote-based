<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\voteSendEmail;


class StorgeConttroller extends Controller
{
    public function SaveFile()
    {
        exec("cd /var/www/we/storage/app/vote && zip -r ShuiZhiJianCeZhongXin.zip ./*");
    }

    public function sendEmail()
    {

        Mail::to('1476281924@qq.com')->send(new voteSendEmail());


    }


}
