<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2019-03-06
 * Time: 11:21
 */

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageType extends FileType
{
    private $imagePath;

    public function __construct($imagePath)
    {
        $this->imagePath = $imagePath;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->addModelTransformer(new CallbackTransformer(
            function (Image $image = null) {
                if ($image instanceof Image) {
                    return new File($this->imagePath . $image->getFile());
                }
            },
            function (UploadedFile $uploadedFile = null) {
                if ($uploadedFile instanceof UploadedFile) {
                    $image = new Image();
                    $image->setFile($uploadedFile);
                    return $image;
                }
            }
        ));
    }
}
