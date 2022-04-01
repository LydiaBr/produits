<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produits", name="produit_list")
     */
    public function list()
    {
        return $this->render('produit/list.html.twig');
    }

    /**
     * @Route("/produits/details", name="produit_details")
     */
    public function details()
    {
        return $this->render('produit/details.html.twig');
    }

    /**
     * @Route("/produits/create", name="produit_create")
     */
    public function create()
    {
        return $this->render('produit/create.html.twig');
    }

}