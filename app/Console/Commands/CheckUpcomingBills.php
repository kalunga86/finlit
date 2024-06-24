<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use App\Models\Bill;
use Carbon\Carbon;
use App\Notifications\UpcomingBillNotification;


class CheckUpcomingBills extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-upcoming-bills';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for upcoming bills and notify users';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $bills = Bill::where('next_due_date', '<=', Carbon::now()->addMonth())->get();

        foreach ($bills as $bill) {
            $user = $bill->user;
            // $user->notify(new UpcomingBillNotification($bill));
            Notification::send($user, new UpcomingBillNotification($bill));
        }
    }
}
