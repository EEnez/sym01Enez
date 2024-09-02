<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('page/home.html.twig', [
            'title' => 'Bienvenue',
        ]);
    }#[Route('/page/1', name: 'page_1')]
#[Route('/page/2', name: 'page_2')]
#[Route('/page/3', name: 'page_3')]
#[Route('/page/haha', name: 'page_haha')]

    #[Route('/page/1', name: 'page_1')]
    public function page1(): Response
    {
        return $this->render('page/page1.html.twig', [
            'title' => 'Page 1',
        ]);
    }

    #[Route('/page/2', name: 'page_2')]
    public function page2(): Response
    {
        return $this->render('page/page2.html.twig', [
            'title' => 'Page 2',
        ]);
    }

    #[Route('/page/3', name: 'page_3')]
    public function page3(): Response
    {
        return $this->render('page/page3.html.twig', [
            'title' => 'Page 3',
        ]);
    }

    #[Route('/page/haha', name: 'page_haha')]
    public function pageHaha(): Response
    {
        throw $this->createNotFoundException('Erreur ! Page non trouvée.');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            // Traiter les données du formulaire ici.
            $message = 'Formulaire envoyé !';
        } else {
            $message = 'Remplissez le formulaire de contact.';
        }

        return $this->render('page/contact.html.twig', [
            'title' => 'Me Contacter',
            'message' => $message,
            'csrf_token' => $this->container->get('security.csrf.token_manager')->getToken('contact_form')->getValue(),
        ]);
    }
}