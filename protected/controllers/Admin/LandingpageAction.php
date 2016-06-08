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

class LandingpageAction extends CAction
{
    /*
     * Action controller for Admin Landing page
     */
    public function run()
    {
        $model = Featurecontrol::model()->find();

        if (isset($_GET['id']) && isset($_GET['action'])) {

            Landingpage::model()->deleteByPk($_GET['id']);

            Yii::app()->user->setFlash('success', "Landing Page Deleted");
        }

        $this->getController()->render('landingpage', array('model'=>$model));
    }
}