<?php

namespace App\Controller;

use App\Entity\Dossierpatient;
use App\Form\DossierpatientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dossierpatient')]
class DossierpatientController extends AbstractController
{
    #[Route('/', name: 'app_dossierpatient_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $dossierpatients = $entityManager
            ->getRepository(Dossierpatient::class)
            ->findAll();

        return $this->render('dossierpatient/index.html.twig', [
            'dossierpatients' => $dossierpatients,
        ]);
    }

    #[Route('/new', name: 'app_dossierpatient_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $dossierpatient = new Dossierpatient();
        $form = $this->createForm(DossierpatientType::class, $dossierpatient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($dossierpatient);
            $entityManager->flush();

            return $this->redirectToRoute('app_dossierpatient_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dossierpatient/new.html.twig', [
            'dossierpatient' => $dossierpatient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dossierpatient_show', methods: ['GET'])]
    public function show(Dossierpatient $dossierpatient): Response
    {
        return $this->render('dossierpatient/show.html.twig', [
            'dossierpatient' => $dossierpatient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dossierpatient_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dossierpatient $dossierpatient, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DossierpatientType::class, $dossierpatient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_dossierpatient_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dossierpatient/edit.html.twig', [
            'dossierpatient' => $dossierpatient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dossierpatient_delete', methods: ['POST'])]
    public function delete(Request $request, Dossierpatient $dossierpatient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dossierpatient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($dossierpatient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_dossierpatient_index', [], Response::HTTP_SEE_OTHER);
    }
}
