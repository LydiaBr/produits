<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produits", name="produit_list")
     */
    public function list(ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->findAll();
        return $this->render('produit/list.html.twig',[
            "produits"=>$produits
        ]);
    }

    /**
     * @Route("/produits/details/{id}", name="produit_details")
     */
    public function details(int $id, ProduitRepository $produitRepository): Response
    {
        $produit = $produitRepository->find($id);
        return $this->render('produit/details.html.twig',[
            "produit"=>$produit
        ]);
    }

    /**
     * @Route("/produits/create", name="produit_create")
     */
    public function create(Request $request,EntityManagerInterface $entityManager): Response
    {
        $produit = new Produit();
        $produit->setDateAjout(new \DateTime());
        $produitForm = $this->createForm(ProduitType::class,$produit);

        $produitForm->handleRequest($request);

        if($produitForm->isSubmitted() && $produitForm->isValid()){
            $entityManager->persist($produit);
            $entityManager->flush();

            $this->addFlash('success','Le nouveau produit a bien été ajouté!');

            return $this->redirectToRoute('produit_details',['id'=>$produit->getId()]);
        }

        return $this->render('produit/create.html.twig',[
            "produitForm"=>$produitForm->createView()
        ]);
    }

    /**
     * @Route("/produits/edit/{id}", name="produit_edit")
     */
    public function edit(int $id, ProduitRepository $produitRepository, EntityManagerInterface $entityManager): Response
    {
        return $this->render('produit/edit.html.twig');
    }

    /**
     * @Route("/produits/delete/{id}", name="produit_delete")
     */
    public function delete(int $id, ProduitRepository $produitRepository,EntityManagerInterface $entityManager): Response
    {
        $produit = $produitRepository->find($id);
        $entityManager->remove($produit);
        $entityManager->flush();

        $this->addFlash('success','Le produit a bien été supprimé!');
        return $this->render('main/accueil.html.twig');
    }

}