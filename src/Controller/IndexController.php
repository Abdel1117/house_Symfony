<?php

namespace App\Controller;

use App\Entity\Tags;
use App\Entity\Apartement;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class IndexController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Apartement::class);
        $product = $repository->findAll();

        $tags_repository = $doctrine->getRepository(Tags::class);
        
        $tags = $tags_repository->findAll();
        
        dump($tags);

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            "appartements"  => $product,
            "Tags" => $tags, 
        ]);
    }
    #[Route('contact', name :"contact")]
    public function contact(): Response
    {
        
        return $this->render('index/contact.html.twig' , [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('showHouse/{produitId}', name: "showHouse")]
    public function showHouse(Request $Request, $produitId, ManagerRegistry $doctrine ): Response  
    {   
        $appartement = $doctrine->getRepository(Apartement::class)->find($produitId);
        if(! $produitId){
            $this->redirect($this->generateUrl('index'));
        }
       

        return $this->render('index/showHouse.html.twig' ,  [
            'Appartement' => $appartement,
        ]);
    }

}
