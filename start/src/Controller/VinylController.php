<?php

namespace App\Controller;

/*use Knp\Bundle\TimeBundle\DateTimeFormatter;*/

use Psr\Cache\CacheItemInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Twig\Environment;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];
        return $this->render('vinyl/home.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
    }
    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(HttpClientInterface $httpClient,CacheInterface $cache, string $slug = null  /*DateTimeFormatter $timeFormatter, */): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        $mixes = $cache->get('mixes_data', function (CacheItemInterface $cacheItem) use ($httpClient){ # si la funcion no recibe argumento esta informacion almacenada no se perdera nunca caso contrario determinamos el tiempo que durara almacenada
            $response = $httpClient->request('GET', 'http://localhost/php-puro-y-symfony/start/mixes.json');#https://raw.githubusercontent.com/SymfonyCasts/vinyl-mixes/main/mixes.json'
            $cacheItem->expiresAfter(5);
            return $response->toArray();#pasamos de json a array
        });

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
            'mixes' => $mixes,
        ]);
        /* $response = $httpClient->request('GET', 'http://localhost/php-puro-y-symfony/start/mixes.json');#https://raw.githubusercontent.com/SymfonyCasts/vinyl-mixes/main/mixes.json
        $mixes = $response->toArray();#pasamos de json a array
        */
        #var_dump($response->getStatusCode());
        /* foreach ($mixes as $key => $mix) {
             $mixes[$key]['ago'] = $timeFormatter->formatDiff($mix['createdAt']);
        ** esto nos permite asignarle al cada posicion del arreglo mixes una nueva propiedad 'ago' que sera igualada a la distancia entre ña fecha actual y la fecha de creacion del vinilo
         }*/

        #dd($mixes);
    }
}