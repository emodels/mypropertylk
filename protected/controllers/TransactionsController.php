<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: PropertyController.php
 *
 ***This is the PropertyController Controller Page.
 */

class TransactionsController extends Controller
{
    public $layout = "";
    /*
     * Filter controller's access permission based on user authantication
     */
    public function filters()
    {
        return array(
            'AccessControl'
        );
    }

    /*
     * Action mapping for controllers
     */
    public function actions()
    {
        return array(
            'transaction'=>'application.controllers.Transactions.TransactionAction',  //action for Change Password page controller
        );
    }

    /*
     * Filter Access controller function to validate User Authantication
     */
    public function filterAccessControl($filterChain)
    {
        /*
         * checking user logged or not
         */
        if (Yii::app()->user->isGuest){
            Yii::app()->user->setReturnUrl(Yii::app()->request->requestUri);
            $this->redirect('/site/login');
        } else {

            switch (Yii::app()->user->usertype){
                case 0:
                    $this->layout = 'adminmain';
                    break;
                case 1:
                    $this->layout = 'membermain';
                    break;
                case 2:
                    $this->layout = 'agentmain';
                    break;
                case 3:
                    $this->layout = 'advertisermain';
                    break;
            }
        }

        $filterChain->run();//default action
    }

}