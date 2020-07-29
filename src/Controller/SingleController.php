<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SingleController extends AbstractController
{
    /**
     * @Route("/{id}", name="single")
     */
    public function show (int $id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository(Produit::class)->find($id);
        $categorie = $em->getRepository(Categorie::class)->find($produit->getCategorie());

        return $this->render('single/single.html.twig', [
            'produit' => $produit,
            'categorie' => $categorie
        ]);
    }
}
