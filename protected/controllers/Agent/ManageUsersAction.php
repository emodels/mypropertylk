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

        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'STATUS' && isset($_GET['id'])) {

            $user =  User::model()->find('id=' . $_GET['id']);

            if (isset($user)) {

                if ($user->status == 0) {
                    $user->status = 1;
                } else if ($user->status == 1){
                    $user->status = 0;
                }
                $user->save(false);

                Yii::app()->user->setFlash('success', "User Updated");
                echo 'done';

            }

            Yii::app()->end();
        }

        $this->getController()->render('manageusers');
    }
}