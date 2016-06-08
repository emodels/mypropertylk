<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: FeatureAction.php
 * Last Update Date: 10-09-2014
 *
 * **This is the Admin Feature Action Page.
 */

class AddLandingpageAction extends CAction
{
    /*
     * Action controller for Admin Landing page
     */
    public function run()
    {
        $model = new Landingpage();

        if (isset($_POST['Landingpage'])) {

            $model->attributes = $_POST['Landingpage'];

            //---------------Save Advertisement Image--------------//
            $model->background_image = CUploadedFile::getInstance($model, 'background_image');

            if (isset($model->background_image) && !is_null($model->background_image)) {

                $rnd = rand(0,9999);  // generate random number between 0-9999

                $model->background_image = "{$rnd}-{$model->background_image->name}";  // random number + file name
                $model->background_image = str_replace('.jpg','.jpeg', $model->background_image);

                CUploadedFile::getInstance($model, 'background_image')->saveAs(Yii::getPathOfAlias('webroot.upload.landingpageimages') . DIRECTORY_SEPARATOR . $model->background_image);

            } else {


                $model->background_image = '';
            }

            $model->save(false);

            Yii::app()->user->setFlash('success', "Landing Page Added");

            $this->getController()->redirect(Yii::app()->baseUrl . '/admin/landingpages');
        }

        $this->getController()->render('add_landing_page', array('model'=>$model));
    }
}