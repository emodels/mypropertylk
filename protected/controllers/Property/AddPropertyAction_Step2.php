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

class AddPropertyAction_Step2 extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        if (isset(Yii::app()->session['property_id'])) {

            $model = Property::model()->findByPk(Yii::app()->session['property_id']);

            if (isset($model)) {

                if (isset($_POST['Property'])) {
                    $model->attributes = $_POST['Property'];

                    if ($model->save(false)){
                        $this->getController()->redirect(Yii::app()->baseUrl . '/property/addproperty_step3');
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

        $this->getController()->render('addproperty_step2', array('model'=>$model));
    }
}