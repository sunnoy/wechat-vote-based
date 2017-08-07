<?php

namespace App\Http\Controllers;

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
        $wechat->server->setMessageHandler(function($message){
            
            switch ($message->MsgType) {
        case 'event':
            return '收到事件消息';
            break;
        case 'text':
            if $message->Content == "你好"
         ｛
                     return '你也好';

            ｝
            
            break;
        case 'image':
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


        return $wechat->server->serve();
    }
}
