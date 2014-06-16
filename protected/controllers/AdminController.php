<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: AdminController.php
 *
 ***This is the AdminController Controller Page.
 */

class AdminController extends Controller
{
    public $layout = "adminmain";
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
            'home'=>'application.controllers.Admin.IndexAction',  //action for admin - index page controller
            'pricelist'=>'application.controllers.Admin.PriceListAction',  //action for admin - Price List page controller
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
            if (Yii::app()->user->usertype != 0) {
                Yii::app()->user->setFlash('error','Sorry you do not have access to Admin control');
                $this->redirect(Yii::app()->baseUrl . '/login');
            }
        }
        $filterChain->run();//default action
    }

}