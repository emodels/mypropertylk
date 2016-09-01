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
            'city'=>'application.controllers.Admin.CityAction',  //action for admin - City List page controller
            'feature'=>'application.controllers.Admin.FeatureAction',  //action for admin - Feature Control page controller
            'landingpages'=>'application.controllers.Admin.LandingpageAction',  //action for admin - Landing Page Control page controller
            'addlandingpage'=>'application.controllers.Admin.AddLandingpageAction',  //action for admin - Landing Page Control page controller
            'editlandingpage'=>'application.controllers.Admin.EditLandingpageAction',  //action for admin - Landing Page Control page controller
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