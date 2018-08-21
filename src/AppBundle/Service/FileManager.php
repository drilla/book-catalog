<?php

namespace AppBundle\Service;

use AppBundle\Entity\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @author drilla
 * Осущетвляет загрузку файлов в нужное место
 * Знает куда положить загруженные файлы
 *
 * todo довести
 */
class FileManager
{
    /** @var  string */
    private $uploadDir;

    public function __construct(string $uploadDir) {
        $this->uploadDir = $uploadDir;
    }

    public function uploadImage(UploadedFile $file, Image $image) : string {
        $dir = $this->getProductUploadDir($image);

        return $this->_upload($file, $dir);
    }

    private function _upload(UploadedFile $file, string $uploadDir) {

        $fileName = $this->_getRandomName($file);

        $file->move($uploadDir, $fileName);

        return $fileName;
    }

    private function getProductUploadDir(Image $image) : string {
        return $this->_getUploadDir('product/'. $image->getProduct()->getId());
    }

    private function _getUploadDir(string $subDir): string {
        return $this->uploadDir . DIRECTORY_SEPARATOR . $subDir;
    }

    private function _getRandomName(UploadedFile $file) : string {
        return  md5(uniqid()) . '.' . $file->guessExtension();
    }
}