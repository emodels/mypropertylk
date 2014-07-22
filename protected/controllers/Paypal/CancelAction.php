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

        $this->getController()->render('cancel');
    }
}