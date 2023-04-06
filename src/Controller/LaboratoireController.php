<?php

namespace App\Controller;

use App\Entity\Laboratoire;
use App\Form\LaboratoireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/laboratoire')]
class LaboratoireController extends AbstractController
{
    #[Route('/', name: 'app_laboratoire_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $laboratoires = $entityManager
            ->getRepository(Laboratoire::class)
            ->findAll();

        return $this->render('laboratoire/index.html.twig', [
            'laboratoires' => $laboratoires,
        ]);
    }

    #[Route('/new', name: 'app_laboratoire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $laboratoire = new Laboratoire();
        $form = $this->createForm(LaboratoireType::class, $laboratoire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($laboratoire);
            $entityManager->flush();

            return $this->redirectToRoute('app_laboratoire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('laboratoire/new.html.twig', [
            'laboratoire' => $laboratoire,
            'form' => $form,
        ]);
    }

    #[Route('/{adresse}', name: 'app_laboratoire_show', methods: ['GET'])]
    public function show(Laboratoire $laboratoire): Response
    {
        return $this->render('laboratoire/show.html.twig', [
            'laboratoire' => $laboratoire,
        ]);
    }

    #[Route('/{adresse}/edit', name: 'app_laboratoire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Laboratoire $laboratoire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LaboratoireType::class, $laboratoire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_laboratoire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('laboratoire/edit.html.twig', [
            'laboratoire' => $laboratoire,
            'form' => $form,
        ]);
    }

    #[Route('/{adresse}', name: 'app_laboratoire_delete', methods: ['POST'])]
    public function delete(Request $request, Laboratoire $laboratoire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$laboratoire->getAdresse(), $request->request->get('_token'))) {
            $entityManager->remove($laboratoire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_laboratoire_index', [], Response::HTTP_SEE_OTHER);
    }
}
