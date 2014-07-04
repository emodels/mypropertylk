<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: IndexAction.php
 * Last Update Date: 11-09-2013
 *
 * **This is the Admin Index Action Page.
 */

class AddAdvertisementAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $form_valid = true;

        $model =  new Advertising();
        $model->entrydate = date("Y-m-d");
        $model->status = 0;

        $advertiserListData = CHtml::listData(User::model()->findAll('usertype = 0 OR usertype = 3'), 'id', 'fullName');

        if (isset($_POST['Advertising'])) {

            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Advertising'];

            $model->adimage = CUploadedFile::getInstance($model, 'adimage');

            if (isset($model->adimage) && !is_null($model->adimage)) {
                $model->adimage = "{$rnd}-{$model->adimage->name}";  // random number + file name
                $model->adimage = str_replace('.jpg','.jpeg', $model->adimage);

                CUploadedFile::getInstance($model, 'adimage')->saveAs(Yii::getPathOfAlias('webroot.upload.adimages') . DIRECTORY_SEPARATOR . $model->adimage);

                list($width, $height, $type, $attr) = getimagesize(Yii::getPathOfAlias('webroot.upload.adimages') . DIRECTORY_SEPARATOR .  $model->adimage);

                if ($width != ($model->size0->width) || $height != ($model->size0->height)) {
                    Yii::app()->user->setFlash('error', 'Image width & height invalid..! Your image should be similar to the selected image size...!');
                    $form_valid = false;
                }
            }

            if ($form_valid == true) {

                if ($model->save()){
                    //CUploadedFile::getInstance($model, 'adimage')->saveAs(Yii::getPathOfAlias('webroot.upload.adimages') . DIRECTORY_SEPARATOR . $model->adimage);
                    Yii::app()->user->setFlash('success', "Data Added Successfully !");
                    $this->getController()->redirect(Yii::app()->baseUrl . '/advertising/advertisement');
                } else{
                    print_r($model->getErrors());
                    Yii::app()->user->setFlash('error', 'Error Saving Record');
                }
            }


        }

        $this->getController()->render('addadvertisement', array('model'=>$model, 'advertiserListData' => $advertiserListData));
    }
}