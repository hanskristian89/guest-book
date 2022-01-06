<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Province;

class grabDataProvince extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:grab-data-province';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grab data for province table';

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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://d.kapanlaginetwork.com/banner/test/province.json');
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result);

        foreach($obj as $o){
            $save = Province::updateOrCreate(['kode' => $o->kode], ['kode' => $o->kode, 'nama' => $o->nama]);
        }

        return;
    }
}
