<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use  App\Http\Controllers\TemperatureController as Temp;

class HourlyFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hour:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Horly fetching data from api';

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
        if (Temp::fetchData() == true){
            $this->info('Hourly Update has been updated successfully');
        }else{
            $this->info('Hourly Update has not updated');

        }
    }
}
