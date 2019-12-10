<?php

namespace App\Form;

use App\Entity\Settings;
use App\Model\SettingsModel;
use App\Repository\SettingsRepository;
use App\Validator\Slug;
use App\Validator\SlugValidator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingsType extends AbstractType
{
    /**
     * @var SettingsRepository
     */
    private $settingsRepository;


    /**
     * SettingsType constructor.
     * @param SettingsRepository $settingsRepository
     */
    public function __construct(SettingsRepository $settingsRepository)
    {

        $this->settingsRepository = $settingsRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if(!$options['is_update']){
            $builder
                ->add('slug', TextType::class, [
                    'label' => 'Код Вставки',
                    'constraints' => new Slug()
                ])
                ->add('title' ,TextType::class, [
                    'label' => 'Заголовок'
                ]);
        }
        $builder->add('value' ,TextType::class, [
            'label' => 'Значення'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SettingsModel::class,
            'is_update' => false
        ]);
    }
}
