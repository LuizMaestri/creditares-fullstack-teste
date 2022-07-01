<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use Symfony\Component\Panther\Client;
// use Symfony\Component\Panther\DomCrawler\Crawler;
use Goutte\Client;

class CrawlerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:crawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        // $this->info("Start processing");
        // $baseUrl = 'https://www.copagril.com.br/';
        // $client = Client::createChromeClient(base_path("drivers/chromedriver"), null, ["port" => 9558]);
        // $crawler = $client->request('GET', $baseUrl.'precos');
        // $client->waitFor('.tabela-precos');
        // $yearNodes = $crawler->filter('ul.nav:nth-child(1)>li>a').links();
        // foreach ($ as $key => $value) {
            # code...
        // }
        // foreach ($yearNodes as $yearNode) {
        //     $this->info($yearNode->getText());
        //     $crawler->selectLink($yearNode->getText()).click();
        //     $this->info('clicked');
        // }
            // ->each(function (Crawler $parentCrawler, $i){
            //     $this->info($parentCrawler->text());
            //     // $parentCrawler->link()
            //     $parentCrawler->click();

            // });

        // $goutteClient = new Client();
        // $crawler = $goutteClient->request('GET', $baseUrl.'precos');
        // $yearNodes = $crawler->filter('ul.nav:nth-child(1)>li>a');
        // foreach ($yearNodes as $yearNode){
        //     dump($yearNode->firstChild->nodeValue);
        //     $yearLink = $crawler->selectLink($yearNode->firstChild->nodeValue)->attr('href');
        //     $crawler = $goutteClient->request('GET', $baseUrl.$yearLink);
        //     $monthNodes = $crawler->filter('ul.nav:nth-child(2)>li>a');
        //     foreach ($monthNodes as $monthNode) {
        //         dump($monthNode->firstChild->nodeValue);
        //         $monthLink = $crawler->selectLink($monthNode->firstChild->nodeValue)->attr('href');
        //         dump($baseUrl.$monthLink);
        //         $crawler = $goutteClient->request('GET', $baseUrl.$monthLink);
        //         $crawler->filter('tbody>tr')
        //             ->each(function($rowNode) {
        //                 dump($rowNode->text());
        //                 $rowNode->filter('td')
        //                     .each(function ($cellNode) {
        //                         dump($cellNode->text());
        //                     });
        //             });
        //     }
        // }
        return 0;
    }
}
