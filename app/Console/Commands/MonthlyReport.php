<?php

namespace App\Console\Commands;

use App\Mail\MonthlyReportMail;
use App\Models\OnlineOrder;
use App\Models\PosOrder;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MonthlyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Monthly Report of restaurants';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = Carbon::today()->subDays(7);
        $date2 = Carbon::now();
        $restaurants = Restaurant::all();
        $title = 'Last 7 days Report'; // Report title

        $meta = [ // For displaying filters description on header
            'Registered on' => $date . ' To ' . $date2,
        ];


        foreach ($restaurants as $restaurant) {
            $onlineOrders = OnlineOrder::whereBetween('date', [$date, $date2])->get();
            $posOrders = PosOrder::whereBetween('order_date', [$date, $date2])->get();
            $data = [
                'online_sales' => $onlineOrders->sum('payable_amount'),
                'pos_sales' => $onlineOrders->sum('amount'),
                'restaurant' => $restaurant
            ];

            Mail::to($restaurant->email)->send(new MonthlyReportMail($data));
        }

        return Command::SUCCESS;
    }
}
