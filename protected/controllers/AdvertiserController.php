<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: MemberController.php
 *
 ***This is the MemberController Controller Page.
 */

class AdvertiserController extends Controller
{
    public $layout = "advertisermain";
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
            'home'=>'application.controllers.Advertiser.IndexAction',  //action for admin - index page controller
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
            if (Yii::app()->user->usertype != 3) {
                Yii::app()->user->setFlash('error','Sorry you do not have access to Advertiser control');
                $this->redirect(Yii::app()->baseUrl . '/login');
            }
        }
        $filterChain->run();//default action
    }

}