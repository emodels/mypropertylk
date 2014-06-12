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

class ArchitectureAction extends CAction
{
    /*
     * Action controller for Property listing page
     */
    public function run()
    {
        if (isset ($_GET['uid'])) {
            $model = User::model()->findByPk($_GET['uid']);
        }

        $this->getController()->render('architecture', array('model' => $model));
    }
}