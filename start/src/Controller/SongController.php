<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
   #[Route('api/songs/{id<\d+>}', name: 'app_songs', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): Response{

       $song = [
           'id' => $id,
           'name' => 'Waterfalls',
           'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
       ];

       $logger->info('Try to put a diferent id than {song}',[
           'song' => $id
       ]);

       return new JsonResponse($song); # es lo mismo que retornar $this->json($song)
    }
}