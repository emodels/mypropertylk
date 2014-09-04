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

class CancelAction extends CAction
{

    public function run()
    {

        //The token of the cancelled payment typically used to cancel the payment within your application
        $token = $_GET['token'];

        if (isset(Yii::app()->session['PAYPAL']))
        {
            $paypal = Yii::app()->session['PAYPAL'];

            if ($paypal->type == 2) {

                $advertisement =  Advertising::model()->find('id = ' . $paypal->referenceid);
                $transaction = Transactions::model()->find('id = '. $paypal->id);

                if (isset($advertisement) && isset($transaction)) {

                    $advertisement->delete();
                    $transaction->delete();
                }
            }
        }

        $this->getController()->render('cancel');
    }
}