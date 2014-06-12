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
    public function run()
    {
        $model = User::model()->findByPk(Yii::app()->user->id);
        $previmage = $model->userimage;

        if (isset($_POST['User'])) {
            $rnd = rand(0, 9999);

            $model->attributes = $_POST['User'];

            $userimage = CUploadedFile::getInstance($model, 'userimage');

            if (isset($userimage) && !is_null($userimage)) {
                $model->userimage = "{$rnd}-{$userimage->name}"; // random number + file name
            } else {
                $model->userimage = $previmage;
            }

            if ($model->save()) {

                /*---(Upload Profile Image)---*/
                if (isset($userimage)) {

                    $userimage->saveAs(Yii::getPathOfAlias('webroot.upload.userimages') . DIRECTORY_SEPARATOR . $model->userimage);
                }

                Yii::app()->user->setFlash('success', "User Profile Updated");
            } else {
                print_r($model->getErrors());
                Yii::app()->user->setFlash('error', 'Error Saving Record');
            }
        }

        //$this->render('profile',array('model'=>$model));
        $this->getController()->render('editprofile',array('model'=>$model));
    }
}