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

class AddPropertyAction_Step4 extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $model = new Inspecttime();

        if (isset(Yii::app()->session['property_id'])) {

            $property = Property::model()->findByPk(Yii::app()->session['property_id']);

            if (isset($property)) {

                $model->property = $property->pid;

                if (Yii::app()->request->isAjaxRequest && isset($_POST['Inspecttime'])) {

                    $model->attributes = $_POST['Inspecttime'];
                    $model->property = $property->pid;

                    if ($model->save(false)){
                        echo 'done';
                    } else{
                        print_r($model->getErrors());
                    }

                    Yii::app()->end();
                }

                if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'DELETE' && isset($_GET['id'])) {

                    Inspecttime::model()->deleteByPk($_GET['id']);
                    echo 'done';

                    Yii::app()->end();
                }

                if (Yii::app()->request->isPostRequest && !Yii::app()->request->isAjaxRequest) {

                    /*---( Send email notification to Admin )---*/
                    $message = $this->getController()->renderPartial('//email/template/email_new_property_added_admin_notification', array('model'=>$property), true);

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
                        $mailer->Subject = 'New Property - # ' . $property->pid . ' added and required authorization';
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

                    /*---( Send email notification to User )---*/
                    $message = $this->getController()->renderPartial('//email/template/email_new_property_added_user_notification', array('model'=>$property), true);

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
                        $mailer->AddAddress(Yii::app()->params['adminEmail']);
                        $mailer->AddAddress(Yii::app()->params['mailCC_1']);
                        $mailer->FromName = 'myproperty.lk';
                        $mailer->CharSet = 'UTF-8';
                        $mailer->Subject = 'Your Property listing # ' . $property->pid . ' with MyProperty.lk';
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

                    $this->getController()->redirect(Yii::app()->baseUrl . '/property/promotelisting?pid=' .Yii::app()->session['property_id']);

                    unset(Yii::app()->session['property_id']);

                    Yii::app()->user->setFlash('success', 'Property Added Successfully');
                }

            } else {
                Yii::app()->user->setFlash('error', 'Invalid Property Request');
                $this->getController()->redirect(Yii::app()->baseUrl);
            }

        } else{
            Yii::app()->user->setFlash('error', 'Invalid Page Request');
            $this->getController()->redirect(Yii::app()->baseUrl);
        }
        $this->getController()->render('addproperty_step4', array('model'=>$model));
    }
}