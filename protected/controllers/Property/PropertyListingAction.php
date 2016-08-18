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

class PropertyListingAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'DELETE' && isset($_GET['pid'])) {

            Property::model()->deleteByPk($_GET['pid']);
            echo 'done';

            Yii::app()->end();
        }

        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'STATUS' && isset($_GET['pid'])) {

            $property =  Property::model()->find('pid=' . $_GET['pid']);

            if (isset($property)) {

                if ($property->status == 0) { /*---( Activate Property )---*/

                    $property->status = 1;

                } else if ($property->status == 1){ /*---( Disable Property )---*/

                    $property->status = 0;
                }
                $property->save(false);

                /*---( Send Approved and live notification email to Member )---*/
                if ($property->status == 1) {

                    $message = $this->getController()->renderPartial('//email/template/email_new_property_approved_and_live', array('model'=>$property), true);

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
                        $mailer->AddAddress($property->agent0->email);
                        $mailer->AddBCC(Yii::app()->params['adminEmail']);
                        $mailer->AddBCC(Yii::app()->params['mailCC_1']);
                        $mailer->FromName = 'myproperty.lk';
                        $mailer->CharSet = 'UTF-8';
                        $mailer->Subject = 'Your Property listing # ' . $property->pid . ' is approved by MyProperty.lk and now live on our website';
                        $mailer->IsHTML();
                        $mailer->Body = $message;
                        $mailer->SMTPDebug  = Yii::app()->params['SMTPDebug'];

                        try{
                            $mailer->Send();

                            /*---( Add to Mail Log )---*/

                            Utility::addMailLog(
                                Yii::app()->params['SMTP_Username'],
                                'myproperty.lk',
                                $property->agent0->email,
                                $property->agent0->fname,
                                'Your Property listing # ' . $property->pid . ' is approved by MyProperty.lk and now live on our website',
                                $message,
                                $property->agent,
                                0
                            );
                        }
                        catch (Exception $ex){
                            echo $ex->getMessage();
                        }
                    }
                }

                Yii::app()->user->setFlash('success', "Property Updated.");
                echo 'done';

            }

            Yii::app()->end();
        }

        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'VENDOR' && isset($_GET['pid'])) {

            $property =  Property::model()->find('pid=' . $_GET['pid']);

            if (isset($property)) {

                if ($property->sendemail == 0) {
                    $property->sendemail = 1;
                } else if ($property->sendemail == 1){
                    $property->sendemail = 0;
                }
                $property->save(false);

                Yii::app()->user->setFlash('success', "Property Updated.");
                echo 'done';

            }

            Yii::app()->end();
        }

        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'SOLD' && isset($_GET['pid'])) {

            $property =  Property::model()->find('pid=' . $_GET['pid']);

            if (isset($property)) {

                if ($property->status == 2) {
                    $property->status = 1;
                } else if ($property->status == 1 || $property->status == 0){
                    $property->status = 2;
                }
                $property->save(false);

                Yii::app()->user->setFlash('success', "Property Updated.");
                echo 'done';

            }

            Yii::app()->end();
        }

        $this->getController()->render('propertylisting');
    }
}