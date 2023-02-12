<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 12/02/2023
 * Time: 23:05
 */

namespace nguyenanhung\CodeIgniter\BasicHelper;

class BasicImageHelperWithGD
{
    protected $image;
    protected $imageFormat;
    
    public function load($imageFile)
    {
        $imageInfo = getImageSize($imageFile);
        $this->imageFormat = $imageInfo[2];
        if ($this->imageFormat === IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($imageFile);
        } elseif ($this->imageFormat === IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($imageFile);
        } elseif ($this->imageFormat === IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($imageFile);
        }
    }

    public function save($imageFile, $__imageFormat = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {
        if ($__imageFormat == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $imageFile, $compression);
        } elseif ($__imageFormat == IMAGETYPE_GIF) {
            imagegif($this->image, $imageFile);
        } elseif ($__imageFormat == IMAGETYPE_PNG) {
            imagepng($this->image, $imageFile);
        }
        if ($permissions != null) {
            chmod($imageFile, $permissions);
        }
    }

    public function getWidth()
    {
        return imagesx($this->image);
    }

    public function getHeight()
    {
        return imagesy($this->image);
    }

    public function resizeToHeight($height)
    {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->__resize($width, $height);
    }

    public function resizeToWidth($width)
    {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->__resize($width, $height);
    }

    public function scale($scale)
    {
        $width = $this->getWidth() * $scale / 100;
        $height = $this->getheight() * $scale / 100;
        $this->__resize($width, $height);
    }

    private function __resize($width, $height)
    {
        $newImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($newImage, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $newImage;
    }
}
