<?php


namespace App\DataMapper;

use App\Entity\Category;
use App\Entity\EntityInterface;
use App\Entity\Settings;
use App\Model\CategoryModel;
use App\Model\ModelInterface;
use App\Model\SettingsModel;
use Doctrine\ORM\Mapping\Entity;


final class SettingsMapper implements DataMapperInterface
{
    public  function entityToModel(EntityInterface $settings): SettingsModel
    {
        $model = new SettingsModel();

        $model->setSlug($settings->getSlug())
              ->setValue($settings->getValue())
              ->setTitle($settings->getTitle())
        ;

        return $model;

    }

    public function modelToEntity(ModelInterface $model , EntityInterface $settings): Settings
    {
        $settings->setSlug($model->getSlug());
        $settings->setValue($model->getValue());
        $settings->setTitle($model->getTitle());

        return $settings;
    }

}