<?php

namespace App\Controller\BackOffice;

use App\Entity\Help;
use App\Form\HelpType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HelpCrudController
 * @package App\Controller\BackOffice
 * @IsGranted("ROLE_BO_ADMIN")
 * @Route("/helps", name="helps_"))
 */
class HelpCrudController extends AbstractController
{
    /**
     * @Route("/add", name="add_help", methods={"POST", "GET"})
     * @Route("/{id}/edit", name="edit", methods={"POST", "GET"})
     * @param Help|null $help
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param FormFactoryInterface $formFactory
     * @return Response
     */
    public function form(Request $request,
                         EntityManagerInterface $em,
                         FormFactoryInterface $formFactory,
                         Help $help = null): Response
    {
        if (!$help) {
            $help = new Help();
        }

        $form = $formFactory->create(HelpType::class, $help);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($help);
            $em->flush();
            return $this->redirectToRoute('backoffice_helps_index');
        }
        return $this->render('backoffice/help/create_update.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/delete", name = "delete", options={"expose": "true"}, methods={"DELETE"})
     * @param Help $help
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function deleteHelpForm(Help $help, EntityManagerInterface $em): Response
    {
        if ($help) {
            $em->remove($help);
            $em->flush();
            return new JsonResponse('ok', 204);
        }
        return new JsonResponse('Not Found', 404);
    }

    /**
     * @Route("/", name="index", methods={"GET"})
     * @return Response
     */
    public function showHelp(): Response
    {
        $helps = $this->getDoctrine()->getRepository(Help::class)->findAll();
        return $this->render('backoffice/help/index.html.twig', [
            'helps' => $helps
        ]);
    }

    /**
     * @Route("/list", name="list", options={"expose": "true"}, methods={"GET"})
     * @return Response
     */
    public function listAction(): Response
    {
        $helps = $this->getDoctrine()->getRepository(Help::class)->findAll();
        return $this->render('backoffice/help/section_content/list.html.twig', [
            'helps' => $helps
        ]);
    }

    /**
     * @Route("/{id}/activate", name="activate", options={"expose": "true"}, methods={"PATCH"})
     * @param Help $help
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function activateAction(Help $help, EntityManagerInterface $em): JsonResponse
    {
        $help->toggleIsActive();
        $em->persist($help);
        $em->flush();
        return new JsonResponse(['isActive' => $help->isActive()], 200);
    }
}
