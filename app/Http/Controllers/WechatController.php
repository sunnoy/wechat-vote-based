<?php

namespace App\Http\Controllers;

use EasyWeChat\Message\Text;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


use Illuminate\Support\Facades\Storage;


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
                            return "HI ! 欢迎关注德阳监测站投票平台\n\n
投票须知：
1.投票时间段为每天的00:00到12:45\n
2.直接向公众号发送投票截图即可投票,保存成功会有消息回复。\n\n
重要：
1.请不要发送非投票截图！！！\n
2.请不要发送非投票截图！！！\n
3.请不要发送非投票截图！！！\n
Tips:
1.直接回复文字即可与图灵机器人聊天喔～～(一定程度上可以替代度娘，帮您解疑答惑)
2.回复任意长度语音获取当天实时投票总数";
                            break;

                        default:
                            // code...
                            break;
                    }
                    break;

                case 'text':
                    $urlcon = $message->Content;
//                    //发送到图灵机器人接口
//
//                    $url = "http://www.tuling123.com/openapi/api?key=f7b6e44c70ea46f3972d95e7bd044789&info=" . $content;
//                    //获取图灵机器人返回的内容
//                    $content = file_get_contents($url);
//                    //对内容json解码
//                    $content = json_decode($content);
//                    //把内容发给用户
                    $client = new Client(); //GuzzleHttp\Client
                    $result = $client->request('POST', 'http://www.tuling123.com/openapi/api', [
                        'form_params' => [
                            'key' => 'f7b6e44c70ea46f3972d95e7bd044789',
                            'info' => $urlcon,
                            'userid' => $message->FromUserName,
                        ]
                    ]);
                    $content = $result->getBody()->getContents();

                    $content = json_decode($content);

                    $text = $content->text;
                    if (!empty($content->url)) {

                        $urll = $content->url;
                    };

                    if (!empty($content->list)) {
                        $list = $content->list;
                    }
                    $tuling = $text;
                    if (!empty($urll)) {

                        $tuling = $text . $urll;

                    } elseif (!empty($list)) {

                        $tuling = $text . $list;

                    } elseif (!empty($urll) && !empty($list)) {

                        $tuling = $text . $urll . $list;

                    }


                    return new Text(['content' => $tuling]);


                    break;

                case 'image':
                    $url = $message->PicUrl;
                    date_default_timezone_set("Asia/Shanghai");


                    //if (date('Hi') >= 0000 && date('Hi') <= 1245) {
                    if (date('Hi') >= 0000 && date('Hi') <= 2245) {

                        $file = $this->saveImage($url);

                        if ($file) {
                            return "Congratulations ! 截图保存成功 ! ";

                        } else {
                            return "Whoops ! 截图保存失败";

                        }

                    } else {
//
                        return "Whoops ! 请在每天的00:00到12:45发送截图哈";
                    }

                    break;
                case 'voice':

                    date_default_timezone_set("Asia/Shanghai");

                    $fileNum = Storage::disk('vote')->files();
                    $num = count($fileNum);
                    $append = '';
                    $uurl = '';
                    $notice= '';

                    if (date('Hi') >= 0000 && date('Hi') <= 1245) {

                        $uurl = "<a href='http://activity.yktour.com.cn/?from=groupmessage#/WildChain?channels=0'>点我马上投票</a>";


                        if ($num >= 1 && $num <= 100) {
                            $append = ",没有投票的要抓紧喔,";
                        } elseif ($num > 100 && $num < 130) {
                            $append = ",大家继续加油喔～,";

                        } elseif ($num >= 130) {
                            $append = ",好给力！";
                        }

                        $notice = "嗨 ！ 当前我们水质监测中心共投" . $num . "张票" . $append . $uurl;

                    }


                    if (date('Hi') >= 1245 && date('Hi') <= 2400) {
                        $num = $num - 1;
                        $uurl = ',明天继续努力喔～';
                        $notice = "嗨 ！ 今天我们水质监测中心共投" . $num . "张票" . $uurl;


                    }





                    return new Text(['content' => $notice]);

                    //return "收到语音消息";
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

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);

        $file = curl_exec($ch);

        curl_close($ch);


        $fileSave = Storage::disk('vote')->put(date("m-d--") . microtime() . mt_rand() . ".jpg", $file, 'public');
        return $fileSave;

    }
}

