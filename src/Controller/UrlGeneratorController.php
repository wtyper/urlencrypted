<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UrlGeneratorController extends AbstractController
{
    /**
     * @Route("/url/generator", name="url_generator")
     */
    public function index()
    {
        return $this->render('url_generator/index.html.twig', [
            'controller_name' => 'UrlGeneratorController',
        ]);
    }
}
