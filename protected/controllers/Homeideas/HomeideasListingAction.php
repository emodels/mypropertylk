<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: HomeideasListingAction.php
 * Last Update Date: 11-09-2013
 *
 * **This is the Admin Home Idea Listing Action Page.
 */

class HomeideasListingAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'DELETE' && isset($_GET['id'])) {

            Homeideas::model()->deleteByPk($_GET['id']);
            echo 'done';

            Yii::app()->end();
        }
        $this->getController()->render('homeideaslisting');
    }
}