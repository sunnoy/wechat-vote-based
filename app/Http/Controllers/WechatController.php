<?php

namespace App\Http\Controllers;

use EasyWeChat\Message\Image;
use EasyWeChat\Foundation\Application;

use Illuminate\Http\Request;

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
        $userApi = $wechat->user;
        $wechat->server->setMessageHandler(function ($message) use ($userApi, $wechat) {
            switch ($message->MsgType) {
                case 'event':
                    //event switch
                    switch ($message->Event) {
                        case 'subscribe':
                            return "welcome kan kan wo men .";
                            break;
                        case 'CLICK':
                            if ($message->EventKey == "V1001_GOOD") {
                                return "jin ri ge qu ";
                            }
                            if ($message->EventKey == "V1002_GOOD") {
                                return "zan yi xia";
                            }
                            break;
                        default:
                            # code...
                            break;
                    }
                    //return '收到事件消息';
                    break;
                case 'text':
                    if ($message->Content == "hao") {
                        return '收到文字消息' ;
                    }
                    return 'no hao';
                    break;
                case 'image':
                    $image1 = new Image(['media_id' => 'kl4iaDLUZoIgMD0YmGXxetX1p4-TptdNdLNojdcl6aE']);
                    $wechat->staff->message($image1)->to($message->FromUserName)->send();
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
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
        //Log::info('return response.');
        return $wechat->server->serve();
    }
}