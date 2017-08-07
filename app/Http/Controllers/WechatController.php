<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Message\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;



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
            return '你好' . $message->FromUserName;
            break;
        case 'image':
            Storage::put($message->FromUserName.".jpg", $message->PicUrl);
            return "这是个图片" . $message->PicUrl;
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

