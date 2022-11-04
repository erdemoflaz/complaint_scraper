<?php

namespace App\Console\Commands;

use App\Models\Color;
use App\Models\Complaint;
use App\Models\Product;
use DOMDocument;
use DOMXPath;
use Illuminate\Console\Command;

class SikayetVarScraperCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sikayet_var:scraper';

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

    const BASE_DOMAIN = 'https://www.sikayetvar.com';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $httpClient = new \GuzzleHttp\Client();

        $fromPage = 1;
        $toPage = 57; // last page is 57

        for ($i = $fromPage; $i <= $toPage; $i++) {
            $response = $httpClient->get('https://www.sikayetvar.com/vitra?page='. $i);
            $htmlString = (string) $response->getBody();

            libxml_use_internal_errors(true);
            $doc = new DOMDocument();
            $doc->loadHTML($htmlString);
            $xpath = new DOMXPath($doc);

            $articles = $xpath->evaluate('//*[@id="main-content"]/div[1]/div[2]/article');

            foreach ($articles as  $index => $article) {
                $titles = $xpath->evaluate('//*[@id="main-content"]/div[1]/div[2]/article['. $index .']/section/h2/a');

                foreach ($titles as $key => $title) {
                    $this->scrape_page_detail(self::BASE_DOMAIN.$title->getAttribute('href'), $title->textContent);
                }
            }
        }
    }

    public function scrape_page_detail($url, $title)
    {
        $httpClient = new \GuzzleHttp\Client();
        $response = $httpClient->get($url);
        $htmlString = (string) $response->getBody();

        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $doc->loadHTML($htmlString);
        $xpath = new DOMXPath($doc);

        $articles = $xpath->evaluate('//*[@id="main-content"]/section[2]/article/div[2]/div[2]/div/p');

        foreach ($articles as  $index => $article) {

            Complaint::create([
                'title' => $title,
                'description' => $article->textContent,
                'product_id' => $this->detect_product($article->textContent),
                'color_id' => $this->detect_color($article->textContent),
            ]);

        }
    }

    public function detect_product($description)
    {
        $productNames = Product::pluck('name', 'id')->all();

        for($i=0; $i < count($productNames); $i++)
        {
            if(strpos($description, array_values($productNames)[$i]) != false) {
                return array_keys($productNames)[$i];
            }
        }
    }

    public function detect_color($description)
    {
        $productColors = Color::pluck('name', 'id')->all();

        for($i=0; $i < count($productColors); $i++)
        {
            if(strpos($description, array_values($productColors)[$i]) != false) {
                return array_keys($productColors)[$i];
            }
        }
    }
}
