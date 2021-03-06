<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(TranslatorInterface $translator): Response
    {
        // Test de traduction dans un controller
        $controller_name = $translator->trans('menu.home');
        $message_flash = $translator->trans('message.flash.test');

        $this->addFlash('success', $message_flash);
    
        return $this->render('pages/front/example-page.html.twig', [
            'controller_name' => $controller_name,
        ]);
    }

    // Pages statiques

    /**
     * @Route("/cgu", name="cgu")
     */
    public function cgu()
    {
        return $this->render('pages/front/cgu.html.twig', [
            'controller_name' => "Conditions générales d'utilisation",
        ]);
    }
}

