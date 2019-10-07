<?php


namespace App\Model;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Slug as AppAssert;

class SettingsModel
{
    /**
     * @AppAssert|Slug
     * @Assert\NotBlank()
     */
    private $slug;
    /**
     *
     * @Assert\NotBlank()
     */
    private $value;
    /**
     *
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @return mixed
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return SettingsModel
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): ?string
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
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     *
     * @param string $value
     * @return SettingsModel
     */
    public function setValue(string $value): SettingsModel
    {
        $this->value = $value;

        return $this;
    }


}