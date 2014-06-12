<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: Emodels Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: PropertyImageUploadAction.php
 * Last Update Date: 21-05-2014
 *
 * **This is the Property Image Upload Action Page.
 */

class PropertytyperelationAction extends CAction
{
    /*
     * Action controller for Inspect time Action page
     */
    public function run()
    {
        $type = new Propertytyperelation();

        $type->propertyid = $_GET['id'];
        $type->save();

    }
}