<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class NewProduitController extends AbstractController
{
    /**
     * @Route("/admin/produit", name="new_produit")
     */
    public function new(Request $request)
    {
        
        $newProduit = new Produit();

        $form = $this->createForm(ProduitType::class, $newProduit);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        
        $newProduit = $form->getData();
    
        $em = $this->getDoctrine()->getManager();
        $em->persist($newProduit);
        $em->flush();

        }

        return $this->render('new_produit/newProduit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}