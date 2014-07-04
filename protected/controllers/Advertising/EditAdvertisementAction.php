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

class EditAdvertisementAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {

        if (isset($_GET['id'])) {
            $model =  Advertising::model()->findByPk($_GET['id']);
        } else {
            Yii::app()->user->setFlash('error', 'Error Page Request');
            $this->getController()->redirect(Yii::app()->baseUrl);
        }

        $advertiserListData = CHtml::listData(User::model()->findAll('usertype = 0 OR usertype = 3'), 'id', 'fullName');

        $form_valid = true;
        $previmage = $model->adimage;

        if (isset($_POST['Advertising'])) {

            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Advertising'];

            $adimage = CUploadedFile::getInstance($model, 'adimage');

            if (isset($adimage) && !is_null($adimage)) {
                $model->adimage = "{$rnd}-{$adimage->name}";  // random number + file name
                $model->adimage = str_replace('.jpg','.jpeg', $model->adimage);

                CUploadedFile::getInstance($model, 'adimage')->saveAs(Yii::getPathOfAlias('webroot.upload.adimages') . DIRECTORY_SEPARATOR . $model->adimage);

                list($width, $height, $type, $attr) = getimagesize(Yii::getPathOfAlias('webroot.upload.adimages') . DIRECTORY_SEPARATOR .  $model->adimage);

                if ($width != ($model->size0->width) || $height != ($model->size0->height)) {
                    Yii::app()->user->setFlash('error', 'Image width & height is invalid..! Your image should be similar to the selected image size...!');
                    $form_valid = false;
                }

            } else {

                $model->adimage = $previmage;
            }

            if ($form_valid == true) {

                if ($model->save()){
                    Yii::app()->user->setFlash('success', "Data Updated Successfully !");
                    $this->getController()->redirect(Yii::app()->baseUrl . '/advertising/advertisement');
                } else{
                    print_r($model->getErrors());
                    Yii::app()->user->setFlash('error', 'Error Saving Record');
                }
            }


        }

        $this->getController()->render('editadvertisement', array('model'=>$model, 'advertiserListData' => $advertiserListData));
    }
}