<?php

namespace App\Form;

use App\Entity\Category;
use App\Model\ArticleModel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Symfony\Component\Form\Extension\Core\Type\FileType as FileFormType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Заголовок'
            ])
//            ->add('short_description', TextareaType::class, [
//                'label' => 'Опис'
//            ])
            ->add('description', TextareaType::class, [
                'label' => 'Опис'
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title'
            ])
            ->add('image', FileFormType::class, [
                'label' => 'Фото',
                'required' => false
            ])
            ->add('files', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArticleModel::class,
        ]);
    }
}
