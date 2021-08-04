<?php

require_once "vendor/autoload.php";

use GuzzleHttp\Client;
use PHPComposer\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;

//tratando url
$url = "https://www.alura.com.br/cursos-online-programacao/php";
$comprimento = stripos($url, '.br') + 4;

$urlBase = substr($url, 0, $comprimento);
$urlRequisitada = substr($url, 24);

//print_r($urlBase);
//print_r($urlRequisitada);

$cliente = new Client(['base_uri' => $urlBase, 'verify' => false]);
$crawler = new Crawler();

$buscador = new Buscador($cliente, $crawler);

$lista = $buscador->buscar($urlRequisitada);

foreach ($lista as $curso) {
    echo $curso . PHP_EOL;
}
