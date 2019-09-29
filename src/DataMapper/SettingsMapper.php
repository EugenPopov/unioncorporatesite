<?php


namespace App\DataMapper;

use App\Entity\Category;
use App\Entity\Settings;
use App\Model\CategoryModel;
use App\Model\SettingsModel;


final class SettingsMapper
{
    public static function entityToModel(Settings $settings): SettingsModel
    {
        $model = new SettingsModel();

        $model->setSlug($settings->getSlug())
              ->setValue($settings->getValue())
        ;

        return $model;

    }

    public function modelToEntity(SettingsModel $model , Settings $settings): Settings
    {
        $settings->setSlug($model->getSlug());
        $settings->setValue($model->getValue());

        return $settings;
    }

}