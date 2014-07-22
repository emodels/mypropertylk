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

class PromotelistingAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        if (isset($_GET['pid'])) {

            $model =  Property::model()->findByPk($_GET['pid']);

            $priceStandard = Pricelist::model()->find("proptype = 'Standard Property'");
            $pricePremier = Pricelist::model()->find("proptype = 'Premier Property'");
            $priceFeatured = Pricelist::model()->find("proptype = 'Featured Property'");

        } else {

            Yii::app()->user->setFlash('error', 'Error Page Request');
            $this->getController()->redirect(Yii::app()->baseUrl);
        }

        /*----( PREMIERE property upgrade - Type = 2 )----*/
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'PREMIERE' && isset($_GET['pid'])) {

            if (Yii::app()->user->usertype == 0) {

                $property =  Property::model()->find('pid=' . $_GET['pid']);

                if (isset($property)) {

                    $property->pricetype = 2;

                    $property->save(false);

                    Yii::app()->user->setFlash('success', "Property Upgraded as a Premiere Property.");
                    echo 'done';

                }

            } else {

                $transaction = new Transactions();

                $transaction->type = 1;
                $transaction->user = Yii::app()->user->id;
                $transaction->transactiondate = date('Y-M-d');
                $transaction->status = 0;
                $transaction->amount = $pricePremier->price;
                $transaction->referenceid = $_GET['pid'];
                $transaction->description = "Upgrade as Premiere Property for #" . $_GET['pid'];
                $transaction->pricetype = $_GET['mode'];

                if ($transaction->save()) {

                    Yii::app()->session['PAYPAL'] = $transaction;
                    echo 'paypal';
                }
            }

            Yii::app()->end();
        }

        /*----( FEATURED property upgrade - Type = 3 )----*/
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'FEATURED' && isset($_GET['pid'])) {

            $featured = 0;
            $featured = Property::model()->count('pricetype = 3');

            if ($featured <= 20) {

                if (Yii::app()->user->usertype == 0) {

                    $property =  Property::model()->find('pid = ' . $_GET['pid']);

                    if (isset($property)) {

                        $property->pricetype = 3;

                        $property->save(false);

                        Yii::app()->user->setFlash('success', "Property Upgraded as a Featured Property.");
                        echo 'done';

                    }

                } else {

                    $transaction = new Transactions();

                    $transaction->type = 1;
                    $transaction->user = Yii::app()->user->id;
                    $transaction->transactiondate = date("Y-m-d");
                    $transaction->status = 0;
                    $transaction->amount = $priceFeatured->price;
                    $transaction->referenceid = $_GET['pid'];
                    $transaction->description = "Upgrade as Featured Property for #" . $_GET['pid'];
                    $transaction->pricetype = $_GET['mode'];

                    if ($transaction->save()) {

                        Yii::app()->session['PAYPAL'] = $transaction;
                        echo 'paypal';
                    }
                }

            } else {

                echo 'exceed';
                Yii::app()->user->setFlash('error', "Featured Property Limit can not exceeded...!");
            }

            Yii::app()->end();


        }

        /*----( STANDARD property upgrade - Type = 1 )----*/
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'STANDARD' && isset($_GET['pid'])) {


            $property =  Property::model()->find('pid=' . $_GET['pid']);

            if (isset($property)) {

                $property->pricetype = 1;

                $property->save(false);

                Yii::app()->user->setFlash('success', "Property Keep as a Standard Property.");
                echo 'done';

            }

            Yii::app()->end();
        }

        $this->getController()->render('promotelisting', array('model' => $model, 'priceStandard' => $priceStandard, 'pricePremier' => $pricePremier, 'priceFeatured' => $priceFeatured));
    }
}