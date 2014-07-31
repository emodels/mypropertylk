<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: PropertyController.php
 *
 ***This is the PropertyController Controller Page.
 */

class ProfileController extends Controller
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
            'changepassword'=>'application.controllers.Profile.ChangePasswordAction',  //action for Change Password page controller
            'editprofile'=>'application.controllers.Profile.EditProfileAction',  //action for Edit Profile page controller
            'manageusers'=>'application.controllers.Profile.ManageUsersAction',  //action for admin - Manage Users page controller
            'adduser'=>'application.controllers.Profile.AddUserAction',  //action for admin - Add Users page controller
            'watchlist'=>'application.controllers.Profile.SavewatchlistAction',  //action for watchlist page controller
        );
    }

    /*
     * Filter Access controller function to validate User Authantication
     */
    public function filterAccessControl($filterChain)
    {
        /*---( If page = watchlist do not check access permission )---*/
        if (substr_count(Yii::app()->request->requestUri,'watchlist') > 0){

            $filterChain->run();//default action
            return true;
        }

        /*
         * checking user logged or not
         */
        if (Yii::app()->user->isGuest){
            Yii::app()->user->setReturnUrl(Yii::app()->request->requestUri);
            $this->redirect(Yii::app()->baseUrl . '/login');
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