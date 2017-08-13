<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class voteSendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $num;


    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct()
    {
        $fileNum = Storage::disk('vote')->files();
        $this->num = count($fileNum);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.email')
            ->cc(['1476281924@qq.com'])
            ->subject('水质监测站投票')
            ->attach(storage_path('app/vote/ShuiZhiJianCeZhan.zip'));
    }
}
