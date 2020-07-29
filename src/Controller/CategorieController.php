<?php

namespace App\Controller;

use App\Entity\Categorie;

use Doctrine\Common\Collections\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie/{id}", name="categorie")
     */
    public function cat(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository(Categorie::class)->find($id);
        $produits = $categorie->getProduits();

        return $this->render('categorie/categorie.html.twig', [
            'produits' => $produits,
            'categorie' => $categorie
            
        ]); 
    }


    
}
