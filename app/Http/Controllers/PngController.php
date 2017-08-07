<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Image;


class WechatController extends Controller
{

    public function save(Application $wechat)
    {
        return "您选择了保存图片哈";
    }
}