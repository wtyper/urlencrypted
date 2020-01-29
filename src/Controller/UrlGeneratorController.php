<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UrlBaseRepository;

class UrlGeneratorController extends AbstractController
{
    /**
     * @Route("/url/generator/result", name="url_generator_result")
     */
    public function index(UrlBaseRepository $urlBaseRepository): Response
    {
        return $this->render('url_generator/result.html.twig', [
            'url_generator' => $urlBaseRepository->findBy([], ['id'=>'DESC'],1),
        ]);
    }
}
