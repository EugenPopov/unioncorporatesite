<?php


namespace App\Model;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileModel implements ModelInterface
{
    private $name;
    private $path;

    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPath(): ?UploadedFile
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath(?UploadedFile $path): void
    {
        $this->path = $path;
    }

}