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

class DetailAction extends CAction
{
    /*
     * Action controller for Property listing page
     */
    public function run()
    {
        if (isset($_GET['pid'])) {

            $model = Property::model()->findByPk($_GET['pid']);

            if (isset($model)) {

                $this->getController()->render('detail', array('model'=>$model, 'prev_id'=>0, 'next_id'=>0));
            }
        }
    }
}