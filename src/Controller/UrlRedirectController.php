<?php

namespace App\Controller;

use App\Entity\UrlRedirect;
use App\Form\UrlRedirectType;
use App\Repository\UrlRedirectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;

/**
 * @Route("/url/redirect")
 */
class UrlRedirectController extends AbstractController
{
    /**
     * @Route("/", name="url_redirect_index", methods={"GET"})
     */
    public function index(UrlRedirectRepository $urlRedirectRepository): Response
    {
        return $this->render('url_redirect/index.html.twig', [
            'url_redirect' => $urlRedirectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="url_redirect_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $urlRedirect = new UrlRedirect();
        $form = $this->createForm(UrlRedirectType::class, $urlRedirect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($urlRedirect);
            $entityManager->flush();
            $nextAction = $form->get('urlGenerator');

            return $this->redirectToRoute('url_redirect_result');
        }

        return $this->render('url_redirect/new.html.twig', [
            'url_redirect' => $urlRedirect,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/result/{id}", name="url_redirect_result")
     */
    public function result (UrlGenerator $urlGenerator): Response
    {
        return $this->render('url_redirect/result.html.twig', [
            'urlGenerator' => $urlGenerator,
        ]);
    }
}
