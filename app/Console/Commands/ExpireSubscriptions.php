<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Carbon\Carbon;

class ExpireSubscriptions extends Command
{

    protected $signature = 'subscriptions:expire';
    protected $description = 'Expire subscriptions whose end date has passed';


    public function handle(): void
    {
        $expiredSubscriptions = Subscription::where('status', 'active')
            ->whereDate('end_date', '<', Carbon::now()->toDateString())
            ->update(['status' => 'expired']);
        
        $this->info('Expired subscriptions: ' . $expiredSubscriptions);
    }
}
