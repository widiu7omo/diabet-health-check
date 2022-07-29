<?php

namespace App\Console\Commands;

use App\Models\Motivasi;
use App\Models\User;
use App\Notifications\MotivationReminder;
use Illuminate\Console\Command;

class SendReminderMotivation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim Notifikasi Kata-kata notifikasi';

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
        $users = User::where("token_fcm", '<>', 'NULL');
        $users->notify(new MotivationReminder(Motivasi::all()));
//        Log::debug($users);
    }
}
