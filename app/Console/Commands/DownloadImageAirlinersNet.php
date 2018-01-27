<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class DownloadImageAirlinersNet extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'bizjets:downloadImageAirlinersNet {reg?}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Download an image from airliners.net for a plane registration';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$reg = $this->argument('reg');

		echo "command called to download :" . $reg . PHP_EOL;

		$url = "http://www.airliners.net/search?registrationActual=" . $reg;
		// echo $url;
		$client = new Client([
			'timeout' => 60.0,
		]);
		$response = $client->request('GET', $url);
		$html = $response->getBody()->getContents();

		$doc = new \DOMDocument();
		$tidy_config = array(
			'clean' => true,
			'output-xhtml' => true,
			'show-body-only' => false,
			'wrap' => 0,
		);
		$tidy = tidy_parse_string($html, $tidy_config, 'UTF8');
		$tidy->cleanRepair();

		$html = $tidy->html();

		libxml_use_internal_errors(true);
		$doc->loadHTML(mb_convert_encoding($html, "UTF-8"));
		libxml_clear_errors();

		$xpath = new \DOMXpath($doc);

		$src = $xpath->evaluate("string(//img[@class='lazy-load']/@src)");

		if ($src) {
			$imgSrc = $src;
			$contents = file_get_contents($imgSrc);
			$save_path = public_path() . "/planeImages/airlinersNet/" . $reg . ".jpg";
			file_put_contents($save_path, $contents);

			$operator = $xpath->evaluate('string(//div[@class="ps-v2-results-display-detail-no-wrapping"] )');

			echo "AirlinerNet: " . $operator . PHP_EOL;
		}
	}
}
