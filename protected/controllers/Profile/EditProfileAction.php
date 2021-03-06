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

class EditProfileAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run($id)
    {
        $model = User::model()->findByPk($id);
        $previmage = $model->userimage;
        $form_valid = true;

        if (isset($_POST['User'])) {
            $rnd = rand(0, 9999);

            $model->attributes = $_POST['User'];

            $userimage = CUploadedFile::getInstance($model, 'userimage');

            if (isset($userimage) && !is_null($userimage)) {
                $model->userimage = "{$rnd}-{$userimage->name}"; // random number + file name
                $model->userimage = str_replace('.jpg','.jpeg', $model->userimage);

                CUploadedFile::getInstance($model, 'userimage')->saveAs(Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR . $model->userimage);

                list($width, $height, $type, $attr) = getimagesize(Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR .  $model->userimage);

                if ($width != 90 && $height != 100) {
                    Yii::app()->user->setFlash('error', 'Image width & height must be 90px and 100px');
                    $form_valid = false;
                    $model->userimage = $previmage;
                }

            } else {

                $model->userimage = $previmage;
            }

            if ($form_valid == true) {

                if ($model->save()) {

                    /*---(Upload Profile Image)---*/
                    /*if (isset($userimage)) {
                        $userimage->saveAs(Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR . $model->userimage);
                    }

                    $filename_array = explode('.', $model->userimage);
                    $fileName_without_extention = $filename_array[0];

                    Yii::import('ext.CThumbCreator.CThumbCreator');

                    $thumb = new CThumbCreator();
                    $thumb->image = Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR . $model->userimage;
                    $thumb->width = 90;
                    //$thumb->height = 100;
                    $thumb->square = false;
                    $thumb->directory = Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR;
                    $thumb->defaultName = $fileName_without_extention;
                    $thumb->createThumb();

                    unlink(Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR . $model->userimage);

                    $thumb->save();*/


                    Yii::app()->user->setFlash('success', "User Profile Updated");
                    $this->getController()->redirect(Yii::app()->baseUrl . '/profile/manageusers');

                } else {
                    print_r($model->getErrors());
                    Yii::app()->user->setFlash('error', 'Error Saving Record');
                }
            }

        }

        $this->getController()->render('editprofile', array('model' => $model));
    }
}