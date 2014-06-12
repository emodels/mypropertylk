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

        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

        $result = $uploader->handleUpload($folder, true);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize=filesize($folder.$result['filename']);
        $fileName=$result['filename'];

        //----------Add to Database--------
        $image = new Propertyimages();
        $image->propertyid = $_GET['id'];
        $image->imagetype = $_GET['type'];
        $image->imagename = $fileName;
        $image->save();
        //---------------------------------

        echo $return;
    }
}