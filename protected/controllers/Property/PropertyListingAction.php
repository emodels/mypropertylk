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

class PropertyListingAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'DELETE' && isset($_GET['pid'])) {

            Property::model()->deleteByPk($_GET['pid']);
            echo 'done';

            Yii::app()->end();
        }

        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'STATUS' && isset($_GET['pid'])) {

            $property =  Property::model()->find('pid=' . $_GET['pid']);

            if (isset($property)) {

                if ($property->status == 0) {
                    $property->status = 1;
                } else if ($property->status == 1){
                    $property->status = 0;
                }
                $property->save(false);

                Yii::app()->user->setFlash('success', "Property Updated.");
                echo 'done';

            }

            Yii::app()->end();
        }

        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'VENDOR' && isset($_GET['pid'])) {

            $property =  Property::model()->find('pid=' . $_GET['pid']);

            if (isset($property)) {

                if ($property->sendemail == 0) {
                    $property->sendemail = 1;
                } else if ($property->sendemail == 1){
                    $property->sendemail = 0;
                }
                $property->save(false);

                Yii::app()->user->setFlash('success', "Property Updated.");
                echo 'done';

            }

            Yii::app()->end();
        }

        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'SOLD' && isset($_GET['pid'])) {

            $property =  Property::model()->find('pid=' . $_GET['pid']);

            if (isset($property)) {

                if ($property->status == 2) {
                    $property->status = 1;
                } else if ($property->status == 1 || $property->status == 0){
                    $property->status = 2;
                }
                $property->save(false);

                Yii::app()->user->setFlash('success', "Property Updated.");
                echo 'done';

            }

            Yii::app()->end();
        }

        $this->getController()->render('propertylisting');
    }
}