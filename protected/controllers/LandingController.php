<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: MemberController.php
 *
 ***This is the MemberController Controller Page.
 */

class LandingController extends Controller
{
    public $layout = "main";
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
            'page'=>'application.controllers.Landing.IndexAction',  //action for Landing - index page controller
        );
    }

    /*
     * Filter Access controller function to validate User Authantication
     */
    public function filterAccessControl($filterChain)
    {
        $filterChain->run();//default action
    }

}