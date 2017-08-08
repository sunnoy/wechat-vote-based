<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Message\Text;
use Illuminate\Support\Facades\Storage;

date_default_timezone_set("Asia/Shanghai");


class WechatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function ($message) {

            switch ($message->MsgType) {
                case 'event':
                    switch ($message->Event) {
                        case 'subscribe':
                            return "HI!欢迎关注德阳监测站投票平台";
                            break;

                        default:
                            // code...
                            break;
                    }
                    break;

                case 'text':
//                    $content = $message->Content;
//                    //发送到图灵机器人接口
//
//                    $url = "http://www.tuling123.com/openapi/api?key=f7b6e44c70ea46f3972d95e7bd044789&info=" . $content;
//                    //获取图灵机器人返回的内容
//                    $content = file_get_contents($url);
//                    //对内容json解码
//                    $content = json_decode($content);
//                    //把内容发给用户
//                    return new Text(['content' => $content->text]);
                    return "copy text message";
                    break;
                case 'image':
                    $url = $message->PicUrl;
                    $file = $this->saveImage($url);
                    //$file = "d";
                    if ($file) {
                        return "Congratulations ! image saved success ! ";
                    } else {
                        return "Whoops ! looks like something went wrong";
                    }

                    break;
                case 'voice':
                    return "HI" . "dong" . "欢迎关注德阳监测站投票平台";
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }

        });


        return $wechat->server->serve();
    }

    public function saveImage($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);

        $file = curl_exec($ch);

        curl_close($ch);


        $fileSave = Storage::disk('vote')->put(date("m-d-h-i-s") . ".jpg", $file);
        return $fileSave;

    }
}

