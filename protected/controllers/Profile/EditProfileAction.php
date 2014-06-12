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

        if (isset($_POST['User'])) {
            $rnd = rand(0, 9999);

            $model->attributes = $_POST['User'];

            $userimage = CUploadedFile::getInstance($model, 'userimage');

            if (isset($userimage) && !is_null($userimage)) {
                $model->userimage = "{$rnd}-{$userimage->name}"; // random number + file name
                $model->userimage = str_replace('.jpg','.jpeg', $model->userimage);
            } else {
                $model->userimage = $previmage;
            }

            if ($model->save()) {

                /*---(Upload Profile Image)---*/
                if (isset($userimage)) {
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

                $thumb->save();


                Yii::app()->user->setFlash('success', "User Profile Updated");
                switch (Yii::app()->user->usertype){
                    case 0:
                        $this->getController()->redirect(Yii::app()->baseUrl . '/admin/manageusers');
                        break;
                    case 1:
                        $this->getController()->redirect(Yii::app()->baseUrl . '/member/manageusers');
                        break;
                    case 2:
                        $this->getController()->redirect(Yii::app()->baseUrl . '/agent/manageusers');
                        break;
                    case 3:
                        $this->getController()->redirect(Yii::app()->baseUrl . '/advertiser/manageusers');
                        break;
                }


            } else {
                print_r($model->getErrors());
                Yii::app()->user->setFlash('error', 'Error Saving Record');
            }
        }

        $this->getController()->render('editprofile', array('model' => $model));
    }
}