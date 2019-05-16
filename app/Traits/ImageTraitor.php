<?php
namespace App\Traits;

use File;

trait ImageTraitor
{
    protected function deleteFiles($photos)
    {
        foreach ($photos as $photo)
        {
            \File::delete($photo);
        }
    }
}
