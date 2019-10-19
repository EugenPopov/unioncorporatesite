<?php


namespace App\Form;


use App\Entity\Category;
use App\Model\ArticleModel;
use App\Model\NewsModel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Заголовок'
            ])
            ->add('short_description', TextareaType::class, [
                'label' => 'Короткий опис'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Опис'
            ])
            ->add('isActive',CheckboxType::class,[
                'label' => "Активна"
            ])
//            ->add('mainPhoto',FileType::class,[
//                'label' => "Фотографія"
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewsModel::class,
            'templates'  => [],
        ]);
    }
}