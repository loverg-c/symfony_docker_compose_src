<?php

namespace App\Form;

use App\Utils\Validator\Constraint\General\GenderConstraint;
use App\Utils\Validator\Constraint\General\NameConstraint;
use App\Utils\Validator\Constraint\General\PhoneNumberConstraint;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\AppUser;

class AppUserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, ['label' => 'first name', 'required' => false, 'constraints' => [new NameConstraint()]])
            ->add('lastName', TextType::class, ['label' => 'last name', 'required' => false, 'constraints' => [new NameConstraint()]])
            ->add('username', TextType::class, ['label' => 'username', 'required' => true])
            ->add('email', TextType::class, ['label' => 'email', 'required' => true])
            ->add('password', TextType::class, ['label' => 'password', 'required' => true])
            ->add('phoneNumber', TextType::class, ['label' => 'phone number', 'required' => false, 'constraints' => [new PhoneNumberConstraint()]])
            ->add('identity', TextType::class, ['label' => 'the identity', 'required' => true])
            ->add('openId', TextType::class, ['label' => 'open id', 'required' => false])
            ->add('birthDate', BirthdayType::class, [
                'label' => 'birth date',
                'widget' => 'single_text',
                'required' => false
            ])
            ->add('gender', TextType::class, ['label' => 'gender', 'required' => false, 'constraints' => [new GenderConstraint()]])
            ->add('birthPlace', TextType::class, ['label' => 'birth place', 'required' => false])
            ->add('birthCountry', TextType::class, ['label' => 'birth country', 'required' => false]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(array(
            'data_class' => AppUser::class,
            'csrf_protection' => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return '';
    }
}
