<?php

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @author drilla
 * Информация об изображении
 */
class Image
{
    /** @var int */
    private $id;

    /** @var  string */
    private $fileName;

    /** @var  UploadedFile */
    private $file;

    public function getId() : int {
        return $this->id;
    }

    public function getFile(): ? UploadedFile {
        return $this->file;
    }

    public function setFile(UploadedFile $file): self {
        $this->file = $file;
        return $this;
    }

    public function getFileName(): ? string {
        return $this->fileName;
    }

    public function setFileName(string $fileName) : self {
        $this->fileName = $fileName;
        return $this;
    }
}