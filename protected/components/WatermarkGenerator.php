<?php
class WatermarkGenerator
{

    public static function GenerateWatermark($directory, $name, $extention) {

        /*---( Add watermark to image )---*/

        // Load the stamp and the photo to apply the watermark to
        switch (strtolower($extention)){

            case 'jpg':
            case 'jpeg':

                $im = imagecreatefromjpeg($directory . $name . '.' . $extention);
                break;

            case 'gif':

                $im = imagecreatefromgif($directory . $name . '.' . $extention);
                break;

            case 'png':

                $im = imagecreatefrompng($directory . $name . '.' . $extention);
                break;
        }

        // First we create our stamp image manually from GD
        $stamp = imagecreatefrompng(Yii::getPathOfAlias('webroot.images') . DIRECTORY_SEPARATOR . 'watermark.png');

        // Set the margins for the stamp and get the height/width of the stamp image
        $marge_right = 0;
        $marge_bottom = 0;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

        // Merge the stamp onto our photo with an opacity of 50%
        imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 30);

        // Save the image to file and free memory
        switch (strtolower($extention)){

            case 'jpg':
            case 'jpeg':

                imagejpeg($im, $directory . $name . '.' . $extention);
                break;

            case 'gif':

                imagegif($im, $directory . $name . '.' . $extention);
                break;

            case 'png':

                imagepng($im, $directory . $name . '.' . $extention);
                break;
        }

        imagedestroy($im);

        /*---( // end of watermark to image )---*/
    }
}