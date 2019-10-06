<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use App\Model\ArticleModel;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Заголовок'
            ])
            ->add('short_description', TextareaType::class, [
                'label' => 'Опис'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Опис'
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title'
            ])
            ->add('template', ChoiceType::class, [
                'choices' => $options['templates'],
                'choice_label' => function($choice, $key , $value) {
                    $key = $value;
                    return $key;
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArticleModel::class,
            'templates'  => [],
        ]);
    }
}
