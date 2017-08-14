<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class zipFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zipFiles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'zip vote Files';

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
        exec("cd /var/www/we/storage/app/vote && zip -r ShuiZhiJianCeZhan.zip ./*");

    }
}
