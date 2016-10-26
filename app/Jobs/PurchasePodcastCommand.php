<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchasePodcastCommand extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $user;
    public $purchaseid;

    /**
     * Create a new job instance.
     *
     * @return void
     */
//    public function __construct(User $user,$purchaseid)
//    {
//        $this->user=$user;
//        $this->purchaseid=$purchaseid;
//    }
    public function __construct($name,$age)
    {

        $this->user=$name;
        $this->purchaseid=$age;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo $this->attempts();
        //$this->release(30);
        //$this->delay(30);
        //print_r($this->user.'---'.$this->purchaseid);
        dd($this->user.'---'.$this->purchaseid);
     // die('bye bye');
    }
}
