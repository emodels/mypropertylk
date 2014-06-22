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

class IndexAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $model = User::model()->findByPk(Yii::app()->user->id);
        $parent =  User::model()->findByPk($model->parentuser);

        $this->getController()->render('index', array('model' => $model, 'parent' => $parent));
    }
}