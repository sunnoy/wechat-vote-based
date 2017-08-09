<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class StorgeConttroller extends Controller
{
    public function SaveFile()
    {
        exec("cd /var/www/we/storage/app/vote && zip -r ShuiZhiJianCeZhongXin.zip ./*");
    }

    public function sendEmail()
    {
        //popSTMP:phdedpoymmtigdea
        //IMAPSTMP:rujnmulrolrbhiee


    }
}
