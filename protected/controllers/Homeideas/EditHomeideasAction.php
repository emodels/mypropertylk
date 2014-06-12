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

class EditHomeideasAction extends CAction
{
    /*
     * Action controller for Property Image Upload Action page
     */
    public function run($id)
    {
        $model = Homeideas::model()->findByPk($id);
        $previmage = $model->imagename;

        if (isset($_POST['Homeideas'])) {
            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Homeideas'];
            $imagename = CUploadedFile::getInstance($model, 'imagename');

            if (isset($imagename) && !is_null($imagename)) {
                $model->imagename = "{$rnd}-{$imagename->name}";  // random number + file name
            } else {
                $model->imagename = $previmage;
            }

            if ($model->save()){
                if (isset($imagename)) {
                    $imagename->saveAs(Yii::getPathOfAlias('webroot.upload.homeideasimages') . DIRECTORY_SEPARATOR . $model->imagename);
                }

                Yii::app()->user->setFlash('success', "Data Updated Successfully !");
                $this->getController()->redirect(Yii::app()->baseUrl . '/homeideas/homeideaslisting');
            } else{
                print_r($model->getErrors());
                Yii::app()->user->setFlash('error', 'Error Saving Record');
            }

        }

        $this->getController()->render('edithomeideas', array('model' => $model));
    }
}