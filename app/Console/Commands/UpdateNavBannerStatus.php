<?php

namespace App\Console\Commands;

use App\Models\NavBanner;
use Illuminate\Console\Command;

class UpdateNavBannerStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nav-banner:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the status of nav banners based on start and end dates';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        NavBanner::chunk(100, function ($banners) {
            foreach ($banners as $banner) {
                if (!$banner->is_manually_set) {
                    $now = now();
                    if ($banner->start_date_time <= $now && $now <= $banner->end_date_time) {
                        $banner->update(['is_active' => true]);
                    } else {
                        $banner->update(['is_active' => false]);
                    }
                }
            }
        });

        $this->info('Nav banner statuses updated successfully.');
    }
}
