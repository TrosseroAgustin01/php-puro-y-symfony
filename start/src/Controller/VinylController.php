<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_home') ]
    public function home(/*Environment $twig */): Response{
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => "Radio head"],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

        return $this->render('vinyl/home.html.twig',[
           'title' => 'PB & Jams',
           'tracks' => $tracks
        ]);
        #dd($tracks);

        /*$html =  $twig->render('vinyl/home.html.twig', array(
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ));

        #dd($html);

        return new Response($html); otras alternativas*/
        //
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browser(string $slug = null): Response{

        if($slug){

            $title = 'Genre: ' .u(str_replace('-',' ', $slug))->title(true);

        }else{
            $title = "All Genres";
        }

        $genre = $slug ? u(str_replace('-',' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig',[
            'genre' => $genre
        ]);
    }
}