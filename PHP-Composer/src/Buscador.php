<?php

namespace PHPComposer\BuscadorDeCursos;

class Buscador
{
    private $httpClient;
    private $crawler;

    public function __construct($httpClient, $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }


    public function buscar(string $url): array
    {
        $resposta = $this->httpClient->request('GET', $url);
        $html = $resposta->getBody();

        $this->crawler->addHtmlContent($html);

        $dadosDosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = array();

        foreach ($dadosDosCursos as $dado) {
            $cursos[] = $dado->textContent;
        }

        return $cursos;
    }
}
