<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Mail\Mailer;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send
                        {user : 用户的 ID }
                        {--queue= : default}';

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
    public function handle(Schedule $schedule)
    {
        $schedule->exec()->everyFiveMinutes();
        //进度条
        $users = array();
        for($i=0;$i<1000000;$i++){
            $users[]=$i;
        }
        dispatch();

// 多少个任务
        $bar = $this->output->createProgressBar(count($users));

        foreach ($users as $user) {
           // $this->performTask($user);

            // 一个任务处理完了，可以前进一点点了
            $bar->advance();
        }

        $bar->finish();;
    }
}
