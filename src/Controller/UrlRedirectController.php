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
        return $this->render('url_redirect/index.html.twig', [
            'url_redirect' => $urlRedirectRepository->findBy(['user' => $this->getUser()]),
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
            $urlRedirect->setUser($this->getUser());
            $entityManager->persist($urlRedirect);
            $entityManager->flush();
            return $this->redirectToRoute('url_redirect_result', ['id' => $urlRedirect->getId()]);
        }
        return $this->render('url_redirect/new.html.twig', [
            'url_redirect' => $urlRedirect,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/result/{id}", name="url_redirect_result")
     */
    public function generated (UrlRedirect $urlRedirect): Response
    {
        return $this->render('url_redirect/result.html.twig', [
            'urlRedirect' => $urlRedirect
        ]);
    }
    /**
     * @Route("/{id}", name="url_redirect_show", methods={"GET"})
     */
    public function show(UrlRedirect $urlRedirect): Response
    {
        return $this->render('url_redirect/show.html.twig', [
            'url_redirect' => $urlRedirect,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="url_redirect_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UrlRedirect $urlRedirect): Response
    {
        $form = $this->createForm(UrlRedirectType::class, $urlRedirect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('url_redirect_index');
        }

        return $this->render('url_redirect/edit.html.twig', [
            'url_redirect' => $urlRedirect,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="url_redirect_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UrlRedirect $urlRedirect): Response
    {
        if ($this->isCsrfTokenValid('delete'.$urlRedirect->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($urlRedirect);
            $entityManager->flush();
        }

        return $this->redirectToRoute('url_redirect_index');
    }
}
