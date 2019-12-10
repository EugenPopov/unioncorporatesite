<?php


namespace App\Form;


use App\Model\NewsModel;
use App\Model\NewsTypeModel;
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
                'label' => 'Опис',
            ])
            ->add('articleType', ChoiceType::class, [
                'label' => 'Тип новини',
                'choices' => [
                    new NewsTypeModel(),
                    new NewsTypeModel('Актуальні'),
                    new NewsTypeModel('Про профспілку'),
                ],
                'choice_label' => function(NewsTypeModel $newsTypeModel){
                            return $newsTypeModel->getName();
                },
                'choice_value' => function(?NewsTypeModel $newsTypeModel){
                    if(!$newsTypeModel)
                        return null;
                    return $newsTypeModel->getName();
                },
                'required' => false

            ])
            ->add('isActive',CheckboxType::class,[
                'label' => "Активна",
                'required' => false
            ])
            ->add('mainPhoto',FileType::class,[
                'label' => "Фотографія",
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewsModel::class,
        ]);
    }
}