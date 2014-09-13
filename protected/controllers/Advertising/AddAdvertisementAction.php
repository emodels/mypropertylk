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

class AddAdvertisementAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $form_valid = true;
        $adPrice = new Adprice();

        $model =  new Advertising();
        $model->entrydate = date("Y-m-d");
        $model->expiredate = date('Y-m-d',strtotime("+7 days"));
        $model->status = ((Yii::app()->user->usertype == 0)? 1 : 0);
        $model->period = 1;

        $advertiserListData = CHtml::listData(User::model()->findAll('id = ' . Yii::app()->user->id), 'id', 'fullName');

        //-----------------Get Advertisement Size and Price--------------//

        if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest) {

            if (isset($_POST['action'])) {

                switch($_POST['action']){

                    case 'getAddSizes':

                        $adSizes = Adprice::model()->findAll('page = ' . $_POST['page']);

                        $array_adSizes = array();
                        foreach($adSizes as $value){

                            $array_adSizes[] = array('id'=>$value->size, 'size'=> $value->size0->size);
                        }

                        echo json_encode($array_adSizes);

                        break;

                    case 'getAddPrice':

                        $adPrice = Adprice::model()->find('page = '. $_POST['page'] . ' AND size = ' . $_POST['size']);

                        if (isset($adPrice)) {

                            $adPriceArray = array('price' => $adPrice->price . ".00", 'image' => $adPrice->adsample);
                            echo json_encode($adPriceArray);
                        }

                        break;

                }

            }

            Yii::app()->end();
        }

        if (isset($_POST['Advertising'])) {

            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Advertising'];

            //---------------Save Advertisement Image--------------//
            $model->adimage = CUploadedFile::getInstance($model, 'adimage');

            if (isset($model->adimage) && !is_null($model->adimage)) {
                $model->adimage = "{$rnd}-{$model->adimage->name}";  // random number + file name
                $model->adimage = str_replace('.jpg','.jpeg', $model->adimage);

                CUploadedFile::getInstance($model, 'adimage')->saveAs(Yii::getPathOfAlias('webroot.upload.adimages') . DIRECTORY_SEPARATOR . $model->adimage);

                list($width, $height, $type, $attr) = getimagesize(Yii::getPathOfAlias('webroot.upload.adimages') . DIRECTORY_SEPARATOR .  $model->adimage);

                if ($width != ($model->size0->width) || $height != ($model->size0->height)) {
                    Yii::app()->user->setFlash('error', 'Image width & height invalid..! Your image should be similar to the selected image size...!');
                    $form_valid = false;
                }
            }

            if ($form_valid == true) {

                //----------------------Save Advertisement--------------//
                if ($model->save()){

                    if (Yii::app()->user->usertype == 0) {

                        Yii::app()->user->setFlash('success', "Advertisement Added Successfully !");
                        $this->getController()->redirect(Yii::app()->baseUrl . '/advertising/advertisement');

                    } else {

                        $transaction = new Transactions();

                        $transaction->type = 2;
                        $transaction->user = Yii::app()->user->id;
                        $transaction->transactiondate = date("Y-m-d H:i:s");
                        $transaction->status = 0;
                        $transaction->amount = $model->adprice;
                        $transaction->referenceid = $model->id;
                        $transaction->description = "New Advertisement Added as #" . $model->id;
                        $transaction->pricetype = 'N/A';

                        if ($transaction->save()) {

                            Yii::app()->session['PAYPAL'] = $transaction;
                            $this->getController()->redirect(Yii::app()->request->baseUrl .'/paypal/buy');
                        }
                        else{
                            print_r($transaction->getErrors());
                        }
                    }

                } else{
                    print_r($model->getErrors());
                    Yii::app()->user->setFlash('error', 'Error Saving Record');
                }
            }


        }

        if (isset($_GET['size'])) {

                $model->size = $_GET['size'];
        }

        $this->getController()->render('addadvertisement', array('model'=>$model, 'advertiserListData' => $advertiserListData, 'adPrice' => $adPrice));
    }
}