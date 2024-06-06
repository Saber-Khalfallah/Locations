<?php

namespace App\Controller;

use App\Entity\Appartement;
use App\Form\AppartementType;
use App\Repository\AppartementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/appartement')]
class AppartementController extends AbstractController
{
    #[Route('/', name: 'app_appartement_index', methods: ['GET'])]
    public function index(AppartementRepository $appartementRepository): Response
    {
        return $this->render('appartement/index.html.twig', [
            'appartements' => $appartementRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_appartement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $appartement = new Appartement();
        $form = $this->createForm(AppartementType::class, $appartement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $appartement->setCreatedAt(new \dateTime);
            $entityManager->persist($appartement);
            $entityManager->flush();

            return $this->redirectToRoute('app_appartement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('appartement/new.html.twig', [
            'appartement' => $appartement,
            'form' => $form,
        ]);
    }

    #[Route('/{NumApp}', name: 'app_appartement_show', methods: ['GET'])]
    public function show(Appartement $appartement): Response
    {
        return $this->render('appartement/show.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{NumApp}/edit', name: 'app_appartement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Appartement $appartement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AppartementType::class, $appartement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager->flush();

            return $this->redirectToRoute('app_appartement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('appartement/edit.html.twig', [
            'appartement' => $appartement,
            'form' => $form,
        ]);
    }

    #[Route('/{NumApp}', name: 'app_appartement_delete', methods: ['POST'])]
    public function delete(Request $request, Appartement $appartement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appartement->getNumApp(), $request->request->get('_token'))) {
            $entityManager->remove($appartement);
             $appartement->setUpdatedAt((new \dateTime));
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_appartement_index', [], Response::HTTP_SEE_OTHER);
    }
}
