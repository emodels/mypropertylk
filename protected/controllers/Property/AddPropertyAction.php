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

class AddPropertyAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $model = new Property();
        $modeltype = new Propertytyperelation();

        if (isset($_GET['type'])) {
            $model->type = $_GET['type'];
        } else {
            Yii::app()->user->setFlash('error', 'Error Page Request');
            $this->getController()->redirect(Yii::app()->baseUrl);
        }

        /*----( Agent Dropdown list )----*/
        $agentListData = array();
        $otherAgentListData = array();

        switch (Yii::app()->user->usertype){
            case 0: //----Admin

                $agentListData = CHtml::listData(User::model()->findAll('usertype = 0 OR usertype = 2'), 'id', 'fullName');
                $otherAgentListData = CHtml::listData(User::model()->findAll('usertype = 0 OR usertype = 2'), 'id', 'fullName');
                break;

            case 1: //----Member

                $agentListData = CHtml::listData(User::model()->findAll('id = ' . Yii::app()->user->id), 'id', 'fullName');
                $otherAgentListData = CHtml::listData(User::model()->findAll('id = ' . Yii::app()->user->id), 'id', 'fullName');

                $model->agent = Yii::app()->user->id;
                $model->otheragent = 0;

                break;

            case 2: //----Agent

                $agentListData = CHtml::listData(User::model()->findAll('id = ' . Yii::app()->user->id . ' OR parentuser = ' . Yii::app()->user->id), 'id', 'fullName');
                $otherAgentListData = CHtml::listData(User::model()->findAll('id = ' . Yii::app()->user->id . ' OR parentuser = ' . Yii::app()->user->id), 'id', 'fullName');
                break;
        }

        $model->sendemail = 0;
        $model->hidestreetaddress = 0;
        $model->dispalyprice = 1;
        $model->propcondition = 1;
        $model->pricetype = 1;
        $model->entrydate = date("Y-m-d");

        if (isset($_POST['Property'])) {

            $model->attributes = $_POST['Property'];

            if ($model->save(false)){

                if (isset($_POST['Propertytyperelation'])) {

                    foreach ($_POST['Propertytyperelation']['typeid'] as $value) {

                        $propertytyperelation = new Propertytyperelation();

                        $propertytyperelation->propertyid = $model->pid;
                        $propertytyperelation->typeid = $value;
                        $propertytyperelation->save();
                    }

                }

                Yii::app()->session['property_id'] = $model->pid;
                $this->getController()->redirect(Yii::app()->baseUrl . '/property/addproperty_step2');

            } else{
                print_r($model->getErrors());
                Yii::app()->user->setFlash('error', 'Error Saving Record');
            }

        }


        $this->getController()->render('addproperty', array('model' => $model, 'modeltype'=>$modeltype, 'agentListData'=>$agentListData, 'otherAgentListData'=>$otherAgentListData));
    }

}