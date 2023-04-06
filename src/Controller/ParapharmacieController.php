<?php

namespace App\Controller;

use App\Entity\Parapharmacie;
use App\Form\ParapharmacieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/parapharmacie')]
class ParapharmacieController extends AbstractController
{
    #[Route('/', name: 'app_parapharmacie_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $parapharmacies = $entityManager
            ->getRepository(Parapharmacie::class)
            ->findAll();

        return $this->render('parapharmacie/index.html.twig', [
            'parapharmacies' => $parapharmacies,
        ]);
    }

    #[Route('/new', name: 'app_parapharmacie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $parapharmacie = new Parapharmacie();
        $form = $this->createForm(ParapharmacieType::class, $parapharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($parapharmacie);
            $entityManager->flush();

            return $this->redirectToRoute('app_parapharmacie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parapharmacie/new.html.twig', [
            'parapharmacie' => $parapharmacie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_parapharmacie_show', methods: ['GET'])]
    public function show(Parapharmacie $parapharmacie): Response
    {
        return $this->render('parapharmacie/show.html.twig', [
            'parapharmacie' => $parapharmacie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_parapharmacie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Parapharmacie $parapharmacie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ParapharmacieType::class, $parapharmacie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_parapharmacie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parapharmacie/edit.html.twig', [
            'parapharmacie' => $parapharmacie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_parapharmacie_delete', methods: ['POST'])]
    public function delete(Request $request, Parapharmacie $parapharmacie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parapharmacie->getId(), $request->request->get('_token'))) {
            $entityManager->remove($parapharmacie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_parapharmacie_index', [], Response::HTTP_SEE_OTHER);
    }
}
