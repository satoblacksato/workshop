<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SumatoriaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $num;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($num)
    {
        $this->num=$num;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        for($ix=1;$ix<=$this->num;$ix++){
            echo $ix;
        }
    }
}
