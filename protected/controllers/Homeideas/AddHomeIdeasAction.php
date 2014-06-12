<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: Emodels Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: PropertyImageUploadAction.php
 * Last Update Date: 21-05-2014
 *
 * **This is the Property Image Upload Action Page.
 */

class AddHomeideasAction extends CAction
{
    /*
     * Action controller for Property Image Upload Action page
     */
    public function run()
    {
        $model = new Homeideas();
        $model->dateadded = date("Y-m-d");
        $model->userid = Yii::app()->user->id;

        if (isset($_POST['Homeideas'])) {
            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Homeideas'];
            $model->imagename = CUploadedFile::getInstance($model, 'imagename');

            if (isset($model->imagename) && !is_null($model->imagename)) {
                $model->imagename = "{$rnd}-{$model->imagename->name}";  // random number + file name
            }

            if ($model->save()){
                CUploadedFile::getInstance($model, 'imagename')->saveAs(Yii::getPathOfAlias('webroot.upload.homeideasimages') . DIRECTORY_SEPARATOR . $model->imagename);
                Yii::app()->user->setFlash('success', "Data Added Successfully !");
                $this->getController()->redirect(Yii::app()->baseUrl . '/homeideas/homeideaslisting');
            } else{
                print_r($model->getErrors());
                Yii::app()->user->setFlash('error', 'Error Saving Record');
            }

        }

        $this->getController()->render('addhomeideas', array('model' => $model));
    }
}