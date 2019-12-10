<?php

namespace App\Form;

use App\Model\CategoryModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{CheckboxType, ChoiceType, HiddenType, TextType};
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                    'label' => 'Заголовок'
            ])
//            ->add('description', TextType::class, [
//                'label' => 'Опис'
//            ])
            ->add('isActive', CheckboxType::class, [
                'label' => 'Активна',
                'required' => false
            ])
            ->add('isOnFooter',CheckboxType::class, [
                'label' => 'Виводити в футері',
                'required' => false
            ])
            ->add('template', ChoiceType::class, [
                'choices' => $options['templates'],
                'choice_label' => function($choice, $key , $value) {
                    $key = $value;
                    return $key;
                }
            ])
            ->add('isOnFooter',CheckboxType::class, [
                'label' => 'Виводити в футері',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CategoryModel::class,
            'templates'  => [],
        ]);
    }
}
