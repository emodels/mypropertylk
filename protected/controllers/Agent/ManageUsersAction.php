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
        /*if (Yii::app()->request->isPostRequest)
        {
            $this->redirect(array("admin/addproperty_step2"));
        }*/
        $this->getController()->render('manageusers');
    }
}