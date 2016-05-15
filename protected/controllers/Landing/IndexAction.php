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

class IndexAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        if (isset($_GET['id'])) {

            $model = Landingpage::model()->findByPk($_GET['id']);

            $this->pageTitle = $model->title;

            Yii::app()->clientScript->registerMetaTag($model->description, 'description');

            if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest) {

                //---------------Email notification to Admin--------------------------------------------------------

                $message = $this->getController()->renderPartial('//email/template/email_landing_page_enquiry', array('model'=>$_POST), true);

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
                    $mailer->AddReplyTo($_POST['email']);
                    $mailer->AddAddress(Yii::app()->params['adminEmail']);
                    $mailer->AddBCC(Yii::app()->params['mailCC_1']);
                    $mailer->FromName = $_POST['name'];
                    $mailer->CharSet = 'UTF-8';
                    $mailer->Subject = 'myproperty.lk Enquiry for landing page #' . $_GET['id'];;
                    $mailer->IsHTML();
                    $mailer->Body = $message;
                    $mailer->SMTPDebug  = Yii::app()->params['SMTPDebug'];

                    try{
                        $mailer->Send();
                    }
                    catch (Exception $ex){

                        echo $ex->getMessage();
                        Yii::app()->end();
                    }
                }

                echo 'done';
                Yii::app()->end();
            }

            if (isset($model)) {

                $this->getController()->render('index', array('model'=> $model));
            }
        }
    }
}