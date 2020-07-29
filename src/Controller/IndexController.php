<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        //recuperer l'entity manager
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository(Produit::class)->findAll();

        return $this->render('base.html.twig',[
            'path' => 'src/Controller/IndexController.php',
            'produits' => $produits,
   
        ]);
    }
}
