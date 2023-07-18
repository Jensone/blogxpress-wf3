<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function contact(): Response
    {
        $form = $this->createForm(ContactType::class);
        
        return $this->render('home/contact.html.twig', [
            'contactForm' => $form,
        ]);
    }
}
