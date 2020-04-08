<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', TextType::class, [
                'label'=> 'Choisissez un Login'
            ])
            ->add('password', PasswordType::class, [
                'label'=> 'Choisissez un password'
            ])
            ->add('mail', EmailType::class, [
                'label'=> 'entre votre e-mail'
            ])
            ->add('name', TextType::class, [
                'label'=> 'entrez votre nom'
            ])
            ->add('firstName', TextType::class, [
                'label'=> 'entrez votre prenom'
            ])
            ->add('adress', TextType::class, [
                'label'=> 'Renseignez votre adresse'
            ])
            ->add('postalCode', NumberType::class, [
                'label'=> 'Code postal :'
            ])
            ->add('city', TextType::class, [
                'label'=> 'ville :'
            ])
            ->add('phone', TelType::class, [
                'label'=> 'Telephone :'
            ])
            ->add('Inscription', SubmitType::class,[
                'attr'=>[
                    'class' => 'btn btn-success btn-lg'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
