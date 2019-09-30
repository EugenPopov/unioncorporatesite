<?php

namespace App\Form;

use App\Entity\Settings;
use App\Model\SettingsModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('slug', TextType::class, [
                'label' => 'Код Вставки'
            ])
            ->add('title' ,TextType::class, [
                'label' => 'Заголовок'
            ])
            ->add('value' ,TextType::class, [
                'label' => 'Значення'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SettingsModel::class,
        ]);
    }
}
