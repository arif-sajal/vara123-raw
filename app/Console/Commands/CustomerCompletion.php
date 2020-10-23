<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Library\Configs\Facades\Configs;

class CustomerCompletion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:completion';

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
     * @return int
     */
    public function handle()
    {
        foreach( Booking::all() as $key => $book ):
            $today = Carbon::now()->toDateString();
            $to_date = $book->to_date->toDateString();
            $different_days = Carbon::parse($to_date)->diffInDays($today);
            if( $different_days  >= Configs::get('default_customer_completion') ):
                $book->provider_completion = 1;
                $book->customer_completion = 1;
                if( $book->save() ):
                    $book->provider->increment('balance',$book->provider_cut);
                    $book->provider->decrement('pending_balance',$book->provider_cut);
                endif;
            endif;
        endforeach;

    }
}
