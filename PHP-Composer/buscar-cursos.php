<?php

require_once "vendor/autoload.php";

use GuzzleHttp\Client;
use PHPComposer\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;

//tratando url para treinar...
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


/*

caso esteja trabalhando em um projeto "legado" e queira carregar classes ou arquivos, pesquisar sobre a inclusão de classmap e files no composer.json

*/


/*
 * para uso do pph unit somente em ambiente de desenvolvimento, ao instalar basta usar o comando:
 * composer require --dev phpunit/phpunit
 *
 * e para preparar nossa aplicação em ambiente de produção de forma que não instale os pacotes que são usados apenas em
 * ambiente de desenvolvimento, basta rodar o comando:
 * composer install --no-dev
 *
 * para saber a versão (por exemplo) do php unit via terminal basta rodar:
 * vendor\bin\phpunit --version
 *
 * para ter scripts prontos para rodar no terminal para esta aplicação basta inserir o camop scripts no composer.json
 * 
 * no composer.json também é possível unificar scripts e criar scripts para windows ou linux por exemplo, rodando a partir do composer
 * como o comando ls por exemplo para listar diretórios..
 * 
 * então podemos entender que é possível executar scripts do composer, scripts criados manualmente, grupos de scripts, 
 * ferramentas de linha de comando, códigos php(passand namespace e método da classe por exemplo), e também executar scripts de forma automática.
 * 
 * ao realizar um composer update(por exemplo) podemos agregar scripts para serem executados juntos, basta usarmos o post-update-cmd no composer.json
 */