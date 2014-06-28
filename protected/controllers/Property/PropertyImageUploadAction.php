<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: Emodels Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: PropertyImageUploadAction.php
 * Last Update Date: 21-05-2014
 *
 * **This is the Property Image Upload Action Page.
 */

class PropertyImageUploadAction extends CAction
{
    /*
     * Action controller for Property Image Upload Action page
     */
    public function run()
    {
        Yii::import("ext.EAjaxUpload.qqFileUploader");


        $folder = 'upload/propertyimages/';
        $allowedExtensions = array("jpg", "png");
        $sizeLimit = 1 * 1024 * 1024;

        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit, 'image_' . $_GET['id'] . '_' . time());

        $result = $uploader->handleUpload($folder, true);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize=filesize($folder.$result['filename']);
        $fileName=$result['filename'];

        if ($fileSize > 0 && $fileName != "") {
            list($width, $height, $type, $attr) = getimagesize(Yii::getPathOfAlias('webroot.upload.propertyimages') . DIRECTORY_SEPARATOR . $fileName);

            if ($width < 800 || $height < 600) {
                echo '{"success":false,"message":"Image width & height must be at least 800px and 600px"}';
                exit();
            }
        }

        FileExtentionRename::RenameFileExtention(Yii::getPathOfAlias('webroot.upload.propertyimages'), $fileName);

        $filename_array = explode('.', $fileName);
        $fileName_without_extention = $filename_array[0];

            /*---( Scale images to 800 X 600 size )---*/
        Yii::import('ext.CThumbCreator.CThumbCreator');

        $thumb = new CThumbCreator();
        $thumb->image = Yii::getPathOfAlias('webroot.upload.propertyimages') . DIRECTORY_SEPARATOR . $fileName;
        $thumb->width = 800;
        $thumb->height = 600;
        $thumb->square = true;
        $thumb->directory = Yii::getPathOfAlias('webroot.upload.propertyimages') . DIRECTORY_SEPARATOR;
        $thumb->defaultName = $fileName_without_extention;
        $thumb->createThumb();

        unlink(Yii::getPathOfAlias('webroot.upload.propertyimages') . DIRECTORY_SEPARATOR . $fileName);

        $thumb->save();

        //----------Add to Database--------
        $image = new Propertyimages();
        $image->propertyid = $_GET['id'];
        $image->imagetype = $_GET['type'];
        $image->imagename = $fileName;
        $image->save();
        //---------------------------------

        echo '{"success":true,"filename":"'. $fileName . '"}';
    }
}