<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\voteSendEmail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendEmails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send emails to voter';

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
    public function handle()
    {
        //$this->info('send emails');
        //Mail::to('ttzhsz@163.com')->send(new voteSendEmail());
        Mail::to('532507593@qq.com')->send(new voteSendEmail());
    }
}
