<?php


namespace App\Form;


use App\Model\FileModel;
use Symfony\Component\Form\Extension\Core\Type\FileType as FileFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Ім\'я файлу'
            ])
            ->add('path', FileFormType::class,[
                'label' => 'Файл',
                'required' =>  false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FileModel::class,
        ]);
    }
}
