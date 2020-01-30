<?php

namespace App\Controller;

use App\Entity\UrlRedirect;
use App\Form\UrlRedirectType;
use App\Repository\UrlRedirectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        return $this->render('url_base/index.html.twig', [
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

            return $this->redirectToRoute('url_base_result');
        }

        return $this->render('url_base/new.html.twig', [
            'url_redirect' => $urlRedirect,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/result/{id}", name="url_redirect_result")
     */
    public function result (UrlRedirect $urlRedirect): Response
    {
        return $this->render('url_base/result.html.twig', [
            'urlRedirect' = $urlRedirect,
        ]);
    }
}
