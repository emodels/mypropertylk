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

class EditpricesAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {

        if (isset($_GET['id'])) {

            $model =  Adprice::model()->findByPk($_GET['id']);
            $advertiserListData = CHtml::listData(User::model()->find('id = ' . $model->id . 'OR id = ' . Yii::app()->user->id), 'id', 'fullName');

        } else {

            Yii::app()->user->setFlash('error', 'Error Page Request');
            $this->getController()->redirect(Yii::app()->baseUrl);
        }

        //-------------Save Updated advertisement-----------//
        if (isset($_POST['Adprice'])) {

            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Adprice'];

            //--------------Save advertisement sample image------//
            $model->adsample = CUploadedFile::getInstance($model, 'adsample');

            if (isset($model->adsample) && !is_null($model->adsample)) {
                $model->adsample = "{$rnd}-{$model->adsample->name}";  // random number + file name
                $model->adsample = str_replace('.jpg','.jpeg', $model->adsample);

                CUploadedFile::getInstance($model, 'adsample')->saveAs(Yii::getPathOfAlias('webroot.upload.adsampleimages') . DIRECTORY_SEPARATOR . $model->adsample);

            }

            if ($model->save(false)){

                Yii::app()->user->setFlash('success', 'Price Updated Successfully..!');
                $this->getController()->redirect(Yii::app()->baseUrl . '/advertising/adpricelisting');

            } else{
                print_r($model->getErrors());
                Yii::app()->user->setFlash('error', 'Error Saving Record');
            }

        }
        $this->getController()->render('editprices', array('model' => $model, 'advertiserListData' => $advertiserListData));
    }
}