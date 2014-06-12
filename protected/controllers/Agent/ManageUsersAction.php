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

class ManageUsersAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'DELETE' && isset($_GET['id'])) {

            $result = User::model()->deleteByPk($_GET['id']);

            if ($result) {
                Yii::app()->user->setFlash('success', "User deleted.");
                echo 'done';

            }

            Yii::app()->end();
        }

        $this->getController()->render('manageusers');
    }
}