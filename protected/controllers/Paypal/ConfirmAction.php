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

class ConfirmAction extends CAction
{
    public function run()
    {

        $token = trim($_GET['token']);
        $payerId = trim($_GET['PayerID']);

        $result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);

        $result['PAYERID'] = $payerId;
        $result['TOKEN'] = $token;
        $result['ORDERTOTAL'] = Yii::app()->session['theTotal'];

        //Detect errors
        if(!Yii::app()->Paypal->isCallSucceeded($result)){
            if(Yii::app()->Paypal->apiLive === true){
                //Live mode basic error message
                $error = 'We were unable to process your request. Please try again later';
            }else{
                //Sandbox output the actual error message to dive in.
                $error = $result['L_LONGMESSAGE0'];
            }
            echo $error;
            Yii::app()->end();
        }else{

            $paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
            //Detect errors
            if(!Yii::app()->Paypal->isCallSucceeded($paymentResult)){
                if(Yii::app()->Paypal->apiLive === true){
                    //Live mode basic error message
                    $error = 'We were unable to process your request. Please try again later';
                }else{
                    //Sandbox output the actual error message to dive in.
                    $error = $paymentResult['L_LONGMESSAGE0'];
                }
                echo $error;
                Yii::app()->end();
            } else{
                //payment was completed successfully

                if (isset(Yii::app()->session['PAYPAL']))
                {

                    $paypal = Yii::app()->session['PAYPAL'];

                    if ($paypal->type == 1) {

                        $property =  Property::model()->find('pid = ' . $paypal->referenceid);
                        $transaction = Transactions::model()->find('id = '. $paypal->id);
                        $transaction->status = 1;

                        if (isset($property)) {

                            switch ($paypal->pricetype) {

                                case "FEATURED":
                                    $property->pricetype = 3;
                                    break;
                                case "PREMIERE":
                                    $property->pricetype = 2;
                                    break;
                                case "STANDARD":
                                    $property->pricetype = 1;
                                    break;
                            }


                            $property->save(false);

                            if ($transaction->save()) {

                                Yii::app()->user->setFlash('success', "Property Upgraded as a Premiere Property.");
                                //echo 'done';
                            }
                        }

                        $this->getController()->render('confirm', array('transaction' => $transaction ));
                    }

                    if ($paypal->type == 2) {

                        echo "Advertisement";
                    }

                }

            }

        }

    }
}