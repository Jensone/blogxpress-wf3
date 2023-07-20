<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(ArticleRepository $articles): Response
    {
        return $this->render('home/home.html.twig', [
            'articles' => $articles->findAll(),
        ]);
    }

    #[Route('/contact', name: 'contact', methods: ['GET', 'POST'])]
    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On stocke les données du formulaire dans des variables
            $nom =  $form->get('Nom')->getData();
            $prenom =  $form->get('Prenom')->getData();
            $sujet =  $form->get('Sujet')->getData();
            $email =  $form->get('Email')->getData();
            $tel = $form->get('Telephone')->getData();
            $message =  $form->get('Message')->getData();

            // On envoie l'email avec les données du formulaire

        }

        $result = $form->getData();
        
        return $this->render('home/contact.html.twig', [
            'contactForm' => $form,
            'result' => $result,
        ]);
    }
}
