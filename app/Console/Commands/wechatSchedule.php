<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use EasyWeChat\Foundation\Application;
use Illuminate\Support\Facades\Storage;


class wechatSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wechatSchedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Application $wechat)
    {
        $broadcast = $wechat->broadcast;
        $fileNum = Storage::disk('vote')->files();
        $num= count($fileNum);
        $broadcast->sendText("嗨 ！ 今天我们水质检测中心一共投".$num."张票");
    }
}
