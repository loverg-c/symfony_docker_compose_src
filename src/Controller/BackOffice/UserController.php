<?php

namespace App\Controller\BackOffice;

use App\Entity\UserBackOffice;
use App\Form\UserBackOfficeType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserController
 * @package App\Controller\BackOffice
 * @IsGranted("ROLE_BO_SUPERADMIN")
 * @Route("/users", name="users_"))
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     * @return Response
     */
    public function indexAction(): Response
    {
        $users = $this->getDoctrine()->getRepository(UserBackOffice::class)->findAll();
        return $this->render('backoffice/users/index.html.twig', [
            'users' => $users,
            'roletranslate' => array_flip(UserBackOffice::ROLES_TRANSLATION)
        ]);
    }

    /**
     * @Route("/list", name="list", options={"expose": "true"}, methods={"GET"})
     * @return Response
     */
    public function listAction(): Response
    {
        $users = $this->getDoctrine()->getRepository(UserBackOffice::class)->findAll();
        return $this->render('backoffice/users/section_content/list.html.twig', [
            'delete_button_id' => 'modal_delete_button_id',
            'users' => $users,
             'roletranslate' => array_flip(UserBackOffice::ROLES_TRANSLATION)
        ]);
    }

    /**
     * @Route("/create", name="create", methods={"POST|GET"})
     * @Route("/{id}/edit" , name="edit")
     * @param UserBackOffice|null $user
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param FormFactoryInterface $formFactory
     * @return Response
     */
    public function createAction(Request $request,
                                 EntityManagerInterface $em,
                                 UserPasswordEncoderInterface $passwordEncoder,
                                 FormFactoryInterface $formFactory,
                                 UserBackOffice $user = null): Response
    {
        if (!$user) {
            $user = new UserBackOffice();
        }

        $form = $formFactory->create(UserBackOfficeType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setIdentity($user->getEmail());
            $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('backoffice_users_index', [
            ]);
        }
        return $this->render('backoffice/users/create_update.html.twig', [
            'form_name' => 'Creation d\'utilisateur',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", options={"expose": "true"}, methods={"DELETE"})
     * @param UserBackOffice $user
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function deleteAction(UserBackOffice $user, EntityManagerInterface $em): Response
    {
        if ($user) {
            $em->remove($user);
            $em->flush();
            return new JsonResponse('ok', 200);
        }
        return new JsonResponse('Not Found', 404);

    }
}