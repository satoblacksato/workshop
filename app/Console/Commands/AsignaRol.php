<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AsignaRol extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:bouncer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Asigna Roles';

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
        //
    }
}
