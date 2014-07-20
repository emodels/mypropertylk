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

class AddPropertyAction_Step4 extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $model = new Inspecttime();

        if (isset(Yii::app()->session['property_id'])) {

            $property = Property::model()->findByPk(Yii::app()->session['property_id']);

            if (isset($property)) {

                $model->property = $property->pid;

                if (Yii::app()->request->isAjaxRequest && isset($_POST['Inspecttime'])) {

                    $model->attributes = $_POST['Inspecttime'];
                    $model->property = $property->pid;

                    if ($model->save(false)){
                        echo 'done';
                    } else{
                        print_r($model->getErrors());
                    }

                    Yii::app()->end();
                }

                if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'DELETE' && isset($_GET['id'])) {

                    Inspecttime::model()->deleteByPk($_GET['id']);
                    echo 'done';

                    Yii::app()->end();
                }

                if (Yii::app()->request->isPostRequest && !Yii::app()->request->isAjaxRequest) {

                    $this->getController()->redirect(Yii::app()->baseUrl . '/property/promotelisting?pid=' .Yii::app()->session['property_id']);
                    unset(Yii::app()->session['property_id']);
                    Yii::app()->user->setFlash('success', 'Property Added Successfully');

                    //$this->getController()->redirect(Yii::app()->baseUrl . '/property/propertylisting?type=0');
                }

            } else {
                Yii::app()->user->setFlash('error', 'Invalid Property Request');
                $this->getController()->redirect(Yii::app()->baseUrl);
            }

        } else{
            Yii::app()->user->setFlash('error', 'Invalid Page Request');
            $this->getController()->redirect(Yii::app()->baseUrl);
        }
        $this->getController()->render('addproperty_step4', array('model'=>$model));
    }
}