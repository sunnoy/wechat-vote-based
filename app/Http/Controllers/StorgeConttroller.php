<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\voteSendEmail;
use GuzzleHttp\Client;




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
        $urlcon="德阳";
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('POST','http://www.tuling123.com/openapi/api', [
            'form_params' => [
                'key' => 'f7b6e44c70ea46f3972d95e7bd044789',
                'info' => $urlcon,
                'userid' => '123',
            ]
        ]);
       $content = $result->getBody()->getContents();
        $content = json_decode($content);

        //var_dump($result->getBody()->getContents());
        return $content->text;

    }


}
