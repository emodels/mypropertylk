<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: MemberController.php
 *
 ***This is the MemberController Controller Page.
 */

class AgentController extends Controller
{
    public $layout = "agentmain";
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
            'home'=>'application.controllers.Agent.IndexAction',  //action for admin - index page controller
            'manageusers'=>'application.controllers.Agent.ManageUsersAction',  //action for admin - index page controller
            'adduser'=>'application.controllers.Agent.AddUserAction',  //action for admin - Add Users page controller
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
            $this->redirect(Yii::app()->baseUrl . '/login');
        }
        else{
            /*
             * checking user premision to access the system
             */
            if (Yii::app()->user->usertype != 2) {
                Yii::app()->user->setFlash('error','Sorry you do not have access to Agent control');
                $this->redirect(Yii::app()->baseUrl . '/login');
            }
        }
        $filterChain->run();//default action
    }

}