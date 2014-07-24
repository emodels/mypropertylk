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

class AddUserAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $model = new User;
        $model->usertype = 1;
        $model->phone = '+94';
        $form_valid = true;


        if (isset($_POST['User'])) {

            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes = $_POST['User'];

            if (User::model()->findByAttributes(array('username'=>$model->username))) {
                $model->addError('user_name', 'Username already used, try else');
                Yii::app()->user->setFlash('error', "Username already used, try else");
            }
            else{

                $model->parentuser = ((Yii::app()->user->usertype == 0) ? 0 : Yii::app()->user->id);
                $model->status = 1;
                $model->userimage = CUploadedFile::getInstance($model, 'userimage');

                if (isset($model->userimage) && !is_null($model->userimage)) {

                    $model->userimage = "{$rnd}-{$model->userimage->name}";  // random number + file name
                    $model->userimage = str_replace('.jpg','.jpeg', $model->userimage);

                    CUploadedFile::getInstance($model, 'userimage')->saveAs(Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR . $model->userimage);

                    list($width, $height, $type, $attr) = getimagesize(Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR .  $model->userimage);

                    if ($width != 90 && $height != 100) {
                        Yii::app()->user->setFlash('error', 'Image width & height must be 90px and 100px');
                        $form_valid = false;
                    }

                } else {

                    $model->userimage = 'user_no_img.png';
                }

                if ($form_valid == true) {

                    if ($model->save()){

                        /*---(Upload Profile Image)---*/
                        /*if ($model->userimage != 'user_no_img.png') {


                        }

                        Yii::import('ext.CThumbCreator.CThumbCreator');

                        $thumb = new CThumbCreator();
                        $thumb->image = Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR . $model->userimage;

                        $thumb->width = 90;
                       //$thumb->height = 100;
                        $thumb->square = false;
                        $thumb->directory = Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR;
                        $thumb->defaultName = explode('.', $model->userimage)[0];
                        $thumb->createThumb();

                        unlink(Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR . $model->userimage);

                        $thumb->save();*/

                        Yii::app()->user->setFlash('success', "User Added Successfully !");
                        $this->getController()->redirect(Yii::app()->baseUrl . '/profile/manageusers');

                    }
                    else{
                        print_r($model->getErrors());
                        Yii::app()->user->setFlash('error', 'Error Saving Record');
                    }
                }

            }
        }

        $this->getController()->render('adduser', array('model' => $model));
    }
}