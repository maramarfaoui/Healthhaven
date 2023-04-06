<?php

namespace App\Controller;

use App\Entity\Medicaments;
use App\Form\MedicamentsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/medicaments')]
class MedicamentsController extends AbstractController
{
    #[Route('/', name: 'app_medicaments_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $medicaments = $entityManager
            ->getRepository(Medicaments::class)
            ->findAll();

        return $this->render('medicaments/index.html.twig', [
            'medicaments' => $medicaments,
        ]);
    }

    #[Route('/new', name: 'app_medicaments_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $medicament = new Medicaments();
        $form = $this->createForm(MedicamentsType::class, $medicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($medicament);
            $entityManager->flush();

            return $this->redirectToRoute('app_medicaments_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medicaments/new.html.twig', [
            'medicament' => $medicament,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medicaments_show', methods: ['GET'])]
    public function show(Medicaments $medicament): Response
    {
        return $this->render('medicaments/show.html.twig', [
            'medicament' => $medicament,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_medicaments_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Medicaments $medicament, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MedicamentsType::class, $medicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_medicaments_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medicaments/edit.html.twig', [
            'medicament' => $medicament,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medicaments_delete', methods: ['POST'])]
    public function delete(Request $request, Medicaments $medicament, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicament->getId(), $request->request->get('_token'))) {
            $entityManager->remove($medicament);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_medicaments_index', [], Response::HTTP_SEE_OTHER);
    }
}
