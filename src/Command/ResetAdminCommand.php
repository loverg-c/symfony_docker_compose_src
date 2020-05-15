<?php

namespace App\Command;

use App\Entity\UserBackOffice;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ResetAdminCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'reset:admin';

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(EntityManagerInterface $em,
                                UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager = $em;
        $this->passwordEncoder = $passwordEncoder;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('reset admin login')
            ->setHelp('reset admin login');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        try {
            $output->writeln("Begin admin reset");
            $userRepo = $this->entityManager->getRepository(UserBackOffice::class);

            $userSBo = $userRepo->findOneBy(['email' => 'superadmin@email.com']) ?? new UserBackOffice();
            $userSBo->setEmail('superadmin@email.com');
            $userSBo->setRoles(['ROLE_BO_SUPERADMIN']);
            $userSBo->setIdentity('superadmin@email.com');
            $userSBo->setUsername('superadmin');
            $userSBo->setFirstName('super');
            $userSBo->setLastName('admin');
            $userSBo->setPassword($this->passwordEncoder->encodePassword($userSBo, 'password'));

            $this->entityManager->persist($userSBo);


            $this->entityManager->flush();
            $output->writeln("Flush admin reset");
            return 0;
        } catch (\Exception $e) {
            $output->writeln("error: " . $e->getMessage());
            return -1;
        }
    }
}
