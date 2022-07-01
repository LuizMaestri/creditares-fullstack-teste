<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Goutte\Client;

class CrawlerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $goutteClient = new Client();
        $crawler = $goutteClient->request('GET', 'https://www.copagril.com.br/precos');
        $infos = $crawler->filter('tr:nth-child(2)>td');
        $aux = array();
        foreach ($infos as $info) {
            # code...
            array_push($aux, $info->firstChild->nodeValue);
        }
        try {
            //code...
            \App\Models\Cultivation::where('name', '=', 'Soja')
                ->history()
                ->create([
                    'price' => $aux[1],
                    'date' => $aux[0],
                    'state' => 'PR',
                ]);
            \App\Models\Cultivation::where('name', '=', 'Milho')
                ->history()
                ->create([
                    'price' => $aux[2],
                    'date' => $aux[0],
                    'state' => 'PR',
                ]);
            \App\Models\Cultivation::where('name', '=', 'Trigo')
                ->history()
                ->create([
                    'price' => $aux[3],
                    'date' => $aux[0],
                    'state' => 'PR',
                ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
