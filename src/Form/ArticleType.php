<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'article title'
            ])
            ->add('introduction', TextType::class, [
                'label' => 'Article Introduction'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description of the article'
            ])
            ->add('image', UrlType::class, [
                'label' => 'Image of article'
            ])
            ->add('price', NumberType::class, [
                'label' => 'The article Price !'
            ])
            ->add('enregistrer', SubmitType::class,[
                'attr' => [
                    'class' => 'btn btn-success btn-lg'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
