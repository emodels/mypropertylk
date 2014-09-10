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

class FeatureAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $model = Featurecontrol::model()->find();

        if (isset($_POST['Featurecontrol'])) {

            $model->attributes = $_POST['Featurecontrol'];

            $model->save(false);

            Yii::app()->user->setFlash('success', "Feature Control saved");
        }

        $this->getController()->render('feature', array('model'=>$model));
    }
}