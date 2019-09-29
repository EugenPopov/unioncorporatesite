<?php


namespace App\Model;


class SettingsModel
{
    private $slug;
    private $value;

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return SettingsModel
     */
    public function setSlug(string $slug): SettingsModel
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return SettingsModel
     */
    public function setValue(string $value): SettingsModel
    {
        $this->value = $value;

        return $this;
    }


}