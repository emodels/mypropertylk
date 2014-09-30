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

class EmailagentAction extends CAction
{
    /*
     * Action controller for Property listing page
     */
    public function run()
    {
        if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest) {

            if (isset($_POST['Enquery'])) {

                //---------------Email notification to Admin--------------------------------------------------------
                $message = $this->getController()->renderPartial('//email/template/email_agent_submit', array('model'=>$_POST['Enquery']), true);

                if (isset($_POST['Enquery']) && isset($message) && $message != "") {

                    /*---( Get Property information )---*/
                    $property = Property::model()->findByPk($_POST['Enquery']['pid']);

                    if (isset($property)) {

                        $agent_vendor_email = '';

                        if ($property->sendemail == 1 && $property->vendoremail != '') {

                            $agent_vendor_email = $property->vendoremail;

                        } else {

                            $agent_vendor_email = $property->agent0->email;
                        }

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
                        $mailer->AddReplyTo($_POST['Enquery']['email']);
                        $mailer->AddAddress($agent_vendor_email);
                        $mailer->AddBCC(Yii::app()->params['adminEmail']);
                        $mailer->AddBCC(Yii::app()->params['mailCC_1']);
                        $mailer->FromName = 'myproperty.lk Enquiry';
                        $mailer->CharSet = 'UTF-8';
                        $mailer->Subject = 'Property Id : # ' . $_POST['Enquery']['pid'] . ' - Enquiry from - ' . ucwords($_POST['Enquery']['name']);
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

                Yii::app()->user->setFlash('success','Thank you for contacting us. We will respond to you as soon as possible.');
            }

            echo 'done';
            Yii::app()->end();
        }
    }
}