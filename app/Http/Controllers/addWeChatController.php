<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class addWeChatController extends Controller
{
    public $meun;

    /**
     * addWeChatController constructor.
     * @param $meun
     */
    public function __construct(Application $app)
    {
        $this->meun = $app->menu;
    }

    public function addMenu(){

        $buttons = [
            [
                "type" => "pic_weixin",
                "name" => "去投票",
                "key"  => "VOTE"
            ],

            [
                "type" => "click",
                "name" => "看统计",
                "key"  => "NUM"
            ],




        ];
        $this->meun->add($buttons);

    }

}
