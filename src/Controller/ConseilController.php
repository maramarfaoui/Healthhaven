<?php

namespace App\Controller;

use App\Entity\Conseil;
use App\Form\ConseilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/conseil')]
class ConseilController extends AbstractController
{
    #[Route('/', name: 'app_conseil_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $conseils = $entityManager
            ->getRepository(Conseil::class)
            ->findAll();

        return $this->render('conseil/index.html.twig', [
            'conseils' => $conseils,
        ]);
    }

    #[Route('/new', name: 'app_conseil_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $conseil = new Conseil();
        $form = $this->createForm(ConseilType::class, $conseil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($conseil);
            $entityManager->flush();

            return $this->redirectToRoute('app_conseil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('conseil/new.html.twig', [
            'conseil' => $conseil,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_conseil_show', methods: ['GET'])]
    public function show(Conseil $conseil): Response
    {
        return $this->render('conseil/show.html.twig', [
            'conseil' => $conseil,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_conseil_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Conseil $conseil, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConseilType::class, $conseil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_conseil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('conseil/edit.html.twig', [
            'conseil' => $conseil,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_conseil_delete', methods: ['POST'])]
    public function delete(Request $request, Conseil $conseil, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conseil->getId(), $request->request->get('_token'))) {
            $entityManager->remove($conseil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_conseil_index', [], Response::HTTP_SEE_OTHER);
    }
}
