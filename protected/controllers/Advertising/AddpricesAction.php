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

class AddpricesAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $model = new Adprice();

        if (isset($_POST['Adprice'])) {

            $model->attributes = $_POST['Adprice'];

            if ($model->save(false)){

                Yii::app()->user->setFlash('success', 'Price Added Successfully..!');
                $this->getController()->redirect(Yii::app()->baseUrl . '/advertising/adpricelisting');

            } else{
                print_r($model->getErrors());
                Yii::app()->user->setFlash('error', 'Error Saving Record');
            }

        }
        $this->getController()->render('addprices', array('model' => $model));
    }
}