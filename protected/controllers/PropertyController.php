<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: PropertyController.php
 *
 ***This is the PropertyController Controller Page.
 */

class PropertyController extends Controller
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
            'addproperty'=>'application.controllers.Property.AddPropertyAction',  //action for admin - Add Property page controller
            'addproperty_step2'=>'application.controllers.Property.AddPropertyAction_Step2',  //action for admin - Add Property Step2 page controller
            'addproperty_step3'=>'application.controllers.Property.AddPropertyAction_Step3',  //action for admin - Add Property Step3 page controller
            'addproperty_step4'=>'application.controllers.Property.AddPropertyAction_Step4',  //action for admin - Add Property Step4 page controller
            'editproperty'=>'application.controllers.Property.EditPropertyAction',  //action for admin - Edit Property page controller
            'editproperty_step2'=>'application.controllers.Property.EditPropertyAction_Step2',  //action for admin - Edit Property Step2 page controller
            'editproperty_step3'=>'application.controllers.Property.EditPropertyAction_Step3',  //action for admin - Edit Property Step3 page controller
            'editproperty_step4'=>'application.controllers.Property.EditPropertyAction_Step4',  //action for admin - Edit Property Step4 page controller
            'propertylisting'=>'application.controllers.Property.PropertyListingAction',  //action for admin - Property Listing page controller
            'propertyimageupload'=>'application.controllers.Property.PropertyImageUploadAction',  //action for admin - Property Image Upload controller
            'viewproperty'=>'application.controllers.Property.ViewPropertyAction',  //action for admin - Property Image Upload controller
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