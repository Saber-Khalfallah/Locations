<?php

namespace App\Controller;

use App\Repository\AppartementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(AppartementRepository $appartementRepository): Response
    {
        
        $user = $this->getUser();

        
        if (!$user) {
            throw $this->createNotFoundException('No user is logged in.');
        }

        
        $apartments = $appartementRepository->findBy(['owner' => $user]);

        return $this->render('home_page/index.html.twig', [
            'appartement' => $apartments,
        ]);
    }
    #[Route('/appartement/{id<[0-9]+>}',name: '_app_new_show')]
    public function appartementShow($id ,AppartementRepository $appartementRepository):Response{
        $appartementId =$appartementRepository->find($id);
        return $this->render('home_page/appartement_single.html.twig', [
            'controller_name' => 'HomePageController',
            'single_appartement'=>$appartementRepository->find($appartementId)
        ]);
    }
}
