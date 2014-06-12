<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: HomeideasListingAction.php
 * Last Update Date: 11-09-2013
 *
 * **This is the Admin Home Idea Listing Action Page.
 */

class HomeideasListingAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $this->getController()->render('homeideaslisting');
    }
}