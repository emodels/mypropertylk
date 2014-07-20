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

class EditPropertyAction_Step3 extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        //------Delete Property / Floor Image----------//
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'DELETE' && isset($_GET['id'])) {

            Propertyimages::model()->deleteByPk($_GET['id']);
            echo 'done';

            Yii::app()->end();
        }

        //----------Set Primary Image from Floor Images------//
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'PRIMARY' && $_GET['type'] == 'FLOOR' && isset($_GET['id'])) {

            if (isset(Yii::app()->session['property_id'])) {

                $pid = Yii::app()->session['property_id'];

                Propertyimages::model()->updateAll(array('primaryimg' => 0), 'propertyid = ' . $pid . ' AND imagetype = 1');
                Propertyimages::model()->updateAll(array('primaryimg' => 1), 'id = ' . $_GET['id']);

                echo 'done';

            }

            Yii::app()->end();
        }

        //----------Set Primary Image from Property Images------//
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'PRIMARY' && $_GET['type'] == 'PROP'  && isset($_GET['id'])) {

            if (isset(Yii::app()->session['property_id'])) {

                $pid = Yii::app()->session['property_id'];

                Propertyimages::model()->updateAll(array('primaryimg' => 0), 'propertyid = ' . $pid . ' AND imagetype = 0');
                Propertyimages::model()->updateAll(array('primaryimg' => 1), 'id = ' . $_GET['id']);

                echo 'done';

            }

            Yii::app()->end();
        }

        //-----Save Property Details--------//
        if (isset(Yii::app()->session['property_id'])) {

            Yii::import("ext.EAjaxUpload.qqFileUploader");

            $model = Property::model()->findByPk(Yii::app()->session['property_id']);

            if (isset($model)) {

                if (isset($_POST['Property'])) {
                    $model->attributes = $_POST['Property'];

                    if ($model->save(false)){
                        $this->getController()->redirect(Yii::app()->baseUrl . '/property/editproperty_step4');
                    } else{
                        print_r($model->getErrors());
                        Yii::app()->user->setFlash('error', 'Error Saving Record');
                    }
                }

            } else {
                Yii::app()->user->setFlash('error', 'Invalid Property Request');
                $this->getController()->redirect(Yii::app()->baseUrl);
            }

        } else{
            Yii::app()->user->setFlash('error', 'Invalid Page Request');
            $this->getController()->redirect(Yii::app()->baseUrl);
        }

        $this->getController()->render('editproperty_step3', array('model'=>$model));
    }
}