<?php

namespace App\Console;

use App\Transaksi;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            $mytime = Carbon::now();
            $datetime = $mytime->toDateTimeString();
            $time = date('H:i:s', strtotime($datetime));
            $ts = Transaksi::where('status', 'pending')->whereDate('created_at', Carbon::now()->toDateString())->get();

            if ($ts->count() > 0) {
                foreach ($ts as $item) {
                    $time_created = date('H:i:s', strtotime($item->created_at . " +4 hours"));
                    if ($time > $time_created) {
                        Transaksi::where('kd_transaksi', $item->kd_transaksi)->update([
                            'status' => 'expired'
                        ]);
                    }
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
