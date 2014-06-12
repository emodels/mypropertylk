<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: PropertyController.php
 *
 ***This is the PropertyController Controller Page.
 */

class ListController extends Controller
{
    public $layout = "";

    /*
     * Action mapping for controllers
     */
    public function actions()
    {
        return array(
            'property'=>'application.controllers.List.PropertyAction',  //action for Buy property page controller
            'detail'=>'application.controllers.List.DetailAction',  //action for Property Detail page controller
            'homeideas'=>'application.controllers.List.HomeideasAction',  //action for Home Ideas page controller
            'architecture'=>'application.controllers.List.ArchitectureAction',  //action for Home Ideas by Architecture page controller
            'commercial'=>'application.controllers.List.CommercialAction',  //action for Commercial page controller
        );
    }

}