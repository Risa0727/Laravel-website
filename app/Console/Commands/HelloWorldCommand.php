<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

// ref: https://tektektech.com/laravel-artisan-make-command/
class HelloWorldCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Display:hello-world';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Just display Hello World';

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
     * @return int
     */
    public function handle()
    {
        // return 0;
        dump("Hello World!!");
    }
}
