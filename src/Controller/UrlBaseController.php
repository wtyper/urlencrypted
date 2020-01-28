<?php

namespace App\Controller;

use App\Entity\UrlBase;
use App\Form\UrlBaseType;
use App\Repository\UrlBaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/url/base")
 */
class UrlBaseController extends AbstractController
{
    /**
     * @Route("/", name="url_base_index", methods={"GET"})
     */
    public function index(UrlBaseRepository $urlBaseRepository): Response
    {
        return $this->render('url_base/index.html.twig', [
            'url_bases' => $urlBaseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="url_base_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $urlBase = new UrlBase();
        $form = $this->createForm(UrlBaseType::class, $urlBase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($urlBase);
            $entityManager->flush();

            return $this->redirectToRoute('url_base_index');
        }

        return $this->render('url_base/new.html.twig', [
            'url_base' => $urlBase,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="url_base_show", methods={"GET"})
     */
    public function show(UrlBase $urlBase): Response
    {
        return $this->render('url_base/show.html.twig', [
            'url_base' => $urlBase,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="url_base_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UrlBase $urlBase): Response
    {
        $form = $this->createForm(UrlBaseType::class, $urlBase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('url_base_index');
        }

        return $this->render('url_base/edit.html.twig', [
            'url_base' => $urlBase,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="url_base_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UrlBase $urlBase): Response
    {
        if ($this->isCsrfTokenValid('delete'.$urlBase->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($urlBase);
            $entityManager->flush();
        }

        return $this->redirectToRoute('url_base_index');
    }
}
