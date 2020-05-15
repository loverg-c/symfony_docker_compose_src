<?php

namespace App\Form;

use App\Entity\UserBackOffice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserBackOfficeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, ['label' => 'Prénom', 'required' => false])
            ->add('lastName', TextType::class, ['label' => 'Nom', 'required' => false])
            ->add('userName', TextType::class, ['label' => 'Pseudo', 'required' => true])
            ->add('email', EmailType::class, ['label' => 'Email', 'required' => true])
            ->add('password', PasswordType::class, ['label' => 'Password', 'required' => true])
            ->add('identity', TextType::class, ['label' => false, 'required' => true])
            ->add('roles', ChoiceType::class, [
                'choices' => UserBackOffice::ROLES_TRANSLATION,
                'multiple' => true,
                'expanded' => true,
                'label' => false,
            ])
            ->add('submit', SubmitType::class, ['label' => false]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserBackOffice::class,
            'csrf_protection' => false,
        ]);
    }
}