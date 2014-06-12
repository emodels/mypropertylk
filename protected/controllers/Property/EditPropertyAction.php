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

class EditPropertyAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $modeltype = new Propertytyperelation();

        if (isset($_GET['pid'])) {
            $model =  Property::model()->findByPk($_GET['pid']);
        } else {
            Yii::app()->user->setFlash('error', 'Error Page Request');
            $this->getController()->redirect(Yii::app()->baseUrl);
        }

        $propertytyperelations_array = array();

        foreach ($model->propertytyperelations as $value){
            $propertytyperelations_array[] = $value->typeid;
        }

        $modeltype->typeid = $propertytyperelations_array;

        if (isset($_POST['Property'])) {

            $model->attributes = $_POST['Property'];

            if ($model->save(false)){

                if (isset($_POST['Propertytyperelation'])) {

                    Propertytyperelation::model()->deleteAll('propertyid = ' . $model->pid);

                    foreach ($_POST['Propertytyperelation']['typeid'] as $value) {

                        $propertytyperelation = new Propertytyperelation();

                        $propertytyperelation->propertyid = $model->pid;
                        $propertytyperelation->typeid = $value;
                        $propertytyperelation->save();
                    }
                }

                Yii::app()->session['property_id'] = $model->pid;
                $this->getController()->redirect(Yii::app()->baseUrl . '/property/editproperty_step2');

            } else{
                print_r($model->getErrors());
                Yii::app()->user->setFlash('error', 'Error Saving Record');
            }

        }

        $this->getController()->render('editproperty', array('model'=>$model, 'modeltype'=>$modeltype));
    }

}