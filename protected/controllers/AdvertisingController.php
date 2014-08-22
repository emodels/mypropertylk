<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: PropertyController.php
 *
 ***This is the PropertyController Controller Page.
 */

class AdvertisingController extends Controller
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
            'advertisement'=>'application.controllers.Advertising.AdvertisementAction',  //action for admin - Advertisement page controller
            'addadvertisement'=>'application.controllers.Advertising.AddAdvertisementAction',  //action for admin - Add New Advertisement page controller
            'adpricelisting'=>'application.controllers.Advertising.AdpricelistingAction',  //action for admin - Ad price Listing page controller
            'addprices'=>'application.controllers.Advertising.AddpricesAction',  //action for admin - Add prices page controller
            'editprices'=>'application.controllers.Advertising.EditpricesAction',  //action for admin - Add prices page controller
            'editadvertisement'=>'application.controllers.Advertising.EditAdvertisementAction',  //action for admin - Edit Advertisement page controller
            'viewaddsizes'=>'application.controllers.Advertising.ViewaddsizesAction',  //action for admin - Edit Advertisement page controller
            'adpricelistingprint'=>'application.controllers.Advertising.AdpricelistingprintAction',  //action for admin - Edit Advertisement page controller
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