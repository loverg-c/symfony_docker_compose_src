<?php

namespace App\Controller\Home;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        return $this->render('home/index.html.twig', [
            'docRoute' => $this->generateUrl('app.swagger_ui', [], UrlGeneratorInterface::ABSOLUTE_URL)
        ]);
    }

    /**
     * @Route("/changelog", name="changelog", methods={"GET"})
     *
     * @return Response
     */
    public function changelog(): Response
    {
        $changelog = file_get_contents($this->getParameter('kernel.project_dir') . '/public/build/documentation/CHANGELOG.md');
        return $this->render('changelog.html.twig', [
            'changelog' => $changelog
        ]);
    }

}
