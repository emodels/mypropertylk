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

            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Adprice'];

            if (Adprice::model()->findByAttributes(array('page'=>$model->page, 'size'=>$model->size))) {

                Yii::app()->user->setFlash('error', "Selected Page and Size already exist...!");

            } else {

                //--------------Save advertisement sample image------//
                $model->adsample = CUploadedFile::getInstance($model, 'adsample');

                if (isset($model->adsample) && !is_null($model->adsample)) {
                    $model->adsample = "{$rnd}-{$model->adsample->name}";  // random number + file name
                    $model->adsample = str_replace('.jpg','.jpeg', $model->adsample);

                    CUploadedFile::getInstance($model, 'adsample')->saveAs(Yii::getPathOfAlias('webroot.upload.adsampleimages') . DIRECTORY_SEPARATOR . $model->adsample);

                }

                if ($model->save(false)){

                    Yii::app()->user->setFlash('success', 'Price Added Successfully..!');
                    $this->getController()->redirect(Yii::app()->baseUrl . '/advertising/adpricelisting');

                } else{
                    print_r($model->getErrors());
                    Yii::app()->user->setFlash('error', 'Error Saving Record');
                }
            }

        }
        $this->getController()->render('addprices', array('model' => $model));
    }
}