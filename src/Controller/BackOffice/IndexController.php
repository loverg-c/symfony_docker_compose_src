<?php

namespace App\Controller\BackOffice;

use App\Entity\Help;
use App\Entity\UserBackOffice;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;

class IndexController extends AbstractController
{
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     *
     * @Route("", name="bo_index", methods={"GET"})
     *
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function indexAction(EntityManagerInterface $em): Response
    {
        //todo repository for count
        return $this->render('backoffice/index.html.twig', [
            'userbo_number' => count($em->getRepository(UserBackOffice::class)->findAll()),
            'help_number' => count($em->getRepository(Help::class)->findAll()),
            'reset_fixture' => filter_var($this->getParameter('reset_fixture'),FILTER_VALIDATE_BOOLEAN ),
        ]);
    }

    /**
     * @IsGranted("ROLE_BO_SUPERADMIN")
     *
     * @Route("/resetfixtures", name="bo_reset_fixtures", methods={"GET"})
     *
     * @param KernelInterface $kernel
     * @return Response
     * @throws \Exception
     */
    public function resetFixturesAction(KernelInterface $kernel): Response
    {
        ob_start();
        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'doctrine:schema:drop',
            '--full-database' => true,
            '--force' => true
        ]);
        $this->runCommand($application, $input);

        $input = new ArrayInput([
            'command' => 'doctrine:migration:migrate',
            '--no-interaction' =>  true
        ]);
        $this->runCommand($application, $input);

        if ('dev' === $this->getParameter('kernel.environment')) {
            $input = new ArrayInput([
               'command' => 'hautelook:fixtures:load',
               '-n' => true
            ]);
            $this->runCommand($application, $input);
        }

        $input = new ArrayInput([
            'command' => 'reset:admin',
        ]);
        $this->runCommand($application, $input);

        ob_end_clean();

        return new Response('Reset de la base de donnée ok');
    }

    /**
     * @param Application $app
     * @param ArrayInput $input
     * @return int
     * @throws \Exception
     */
    private function runCommand(Application $app, ArrayInput $input)
    {
        $output = new NullOutput();
        return $app->run($input, $output);
    }
}
