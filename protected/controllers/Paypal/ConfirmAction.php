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

                            $property->entrydate = date('Y-m-d H:i:s');

                            $property->save(false);

                            if ($transaction->save()) {

                                Yii::app()->user->setFlash('success', "Property Upgraded Successfully.");
                                //echo 'done';

                                //---------------Email notification to User--------------------------------------------------------
                                $message = $this->getController()->renderPartial('//email/template/email_user_submit', array('model'=>$transaction), true);

                                if (isset($message) && $message != "") {

                                    $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
                                    $mailer->Host = Yii::app()->params['SMTP_Host'];
                                    $mailer->Port = Yii::app()->params['SMTP_Port'];
                                    if (Yii::app()->params['SMTPSecure'] == TRUE){
                                        $mailer->SMTPSecure = 'ssl';
                                    }
                                    $mailer->IsSMTP();
                                    $mailer->SMTPAuth = true;
                                    $mailer->Username = Yii::app()->params['SMTP_Username'];
                                    $mailer->Password = Yii::app()->params['SMTP_password'];
                                    $mailer->From = Yii::app()->params['SMTP_Username'];
                                    $mailer->AddReplyTo(Yii::app()->params['adminEmail']);
                                    $mailer->AddAddress(Yii::app()->params['adminEmail']);
                                    $mailer->AddAddress(Yii::app()->params['mailCC_1']);
                                    $mailer->FromName = 'myproperty.lk';
                                    $mailer->CharSet = 'UTF-8';
                                    $mailer->Subject = 'myproperty.lk Property Transaction - # ' . $transaction->id . ' Successfully Completed...';
                                    $mailer->IsHTML();
                                    $mailer->Body = $message;
                                    $mailer->SMTPDebug  = Yii::app()->params['SMTPDebug'];

                                    try{
                                        $mailer->Send();
                                    }
                                    catch (Exception $ex){
                                        echo $ex->getMessage();
                                    }
                                }
                            }
                        }

                        $this->getController()->render('confirm', array('transaction' => $transaction ));
                    }

                    if ($paypal->type == 2) {

                        $advertisement =  Advertising::model()->find('id = ' . $paypal->referenceid);
                        $transaction = Transactions::model()->find('id = '. $paypal->id);
                        $transaction->status = 1;

                        if (isset($advertisement)) {

                            $advertisement->status = 1;


                            $advertisement->save(false);

                            if ($transaction->save()) {

                                Yii::app()->user->setFlash('success', "Your Advertisement Added Successfully..!");
                                //echo 'done';

                                //---------------Email notification to User--------------------------------------------------------
                                $message = $this->getController()->renderPartial('//email/template/email_advertisement_submit', array('model'=>$transaction), true);

                                if (isset($message) && $message != "") {

                                    $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
                                    $mailer->Host = Yii::app()->params['SMTP_Host'];
                                    $mailer->Port = Yii::app()->params['SMTP_Port'];
                                    if (Yii::app()->params['SMTPSecure'] == TRUE){
                                        $mailer->SMTPSecure = 'ssl';
                                    }
                                    $mailer->IsSMTP();
                                    $mailer->SMTPAuth = true;
                                    $mailer->Username = Yii::app()->params['SMTP_Username'];
                                    $mailer->Password = Yii::app()->params['SMTP_password'];
                                    $mailer->From = Yii::app()->params['SMTP_Username'];
                                    $mailer->AddReplyTo(Yii::app()->params['adminEmail']);
                                    $mailer->AddAddress(Yii::app()->params['adminEmail']);
                                    $mailer->AddAddress(Yii::app()->params['mailCC_1']);
                                    $mailer->FromName = 'myproperty.lk';
                                    $mailer->CharSet = 'UTF-8';
                                    $mailer->Subject = 'myproperty.lk Advertisement Transaction  - # ' . $transaction->id . ' Successfully Completed...';
                                    $mailer->IsHTML();
                                    $mailer->Body = $message;
                                    $mailer->SMTPDebug  = Yii::app()->params['SMTPDebug'];

                                    try{
                                        $mailer->Send();
                                    }
                                    catch (Exception $ex){
                                        echo $ex->getMessage();
                                    }
                                }
                            }
                        }

                        $this->getController()->render('confirm', array('transaction' => $transaction ));
                    }

                }

            }

        }

    }
}