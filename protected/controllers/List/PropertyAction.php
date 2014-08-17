<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: IndexAction.php
 * Last Update Date: 11-09-2013
 *
 * **This is the Admin Index Action Page.
 */

class PropertyAction extends CAction
{
    /*
     * Action controller for Property listing page
     */
    public function run()
    {
        $array_searchpara = new stdClass();

        $array_searchpara->type = 0;
        $array_searchpara->town = "";
        $array_searchpara->category = "";
        $array_searchpara->minbed = 0;
        $array_searchpara->maxbed = 0;
        $array_searchpara->minprice = 0;
        $array_searchpara->maxprice = 0;
        $array_searchpara->district = 0;
        $array_searchpara->bathrooms = 0;
        $array_searchpara->carspaces = 0;
        $array_searchpara->landsize = 0;
        $array_searchpara->condition = 0;
        $array_searchpara->premiere = false;

        if (isset($_GET['district'])) {

            $array_searchpara->district = $_GET['district'];
        }

        $model = new Property();
        $modeltype = new Propertytyperelation();

        if (isset(Yii::app()->session['search'])) {

            $search_session = Yii::app()->session['search'];
        }

        if (isset($search_session['type'])) {
            $array_searchpara->type = $search_session['type'];
        }
        if (isset($search_session['town'])) {
            $array_searchpara->town = $search_session['town'];
            $model->townname = $search_session['town'];
        }
        if (isset($search_session['category'])) {
            if (($search_session['category']) == 'null') {
                $array_searchpara->category = "";
                $modeltype->typeid = '';
            } else {
                $array_searchpara->category = $search_session['category'];
                $modeltype->typeid = explode(',', $search_session['category']);
            }
        }

        if (isset($search_session['minbed'])) {
            $array_searchpara->minbed = $search_session['minbed'];
        }
        if (isset($search_session['maxbed'])) {
            $array_searchpara->maxbed = $search_session['maxbed'];
        }
        if (isset($search_session['minprice'])) {
            $array_searchpara->minprice = $search_session['minprice'];
        }
        if (isset($search_session['maxprice'])) {
            $array_searchpara->maxprice = $search_session['maxprice'];
        }
        if (isset($search_session['district'])) {
            $array_searchpara->district = $search_session['district'];
        }
        if (isset($search_session['bathrooms'])) {
            $array_searchpara->bathrooms = $search_session['bathrooms'];
        }
        if (isset($search_session['carspaces'])) {
            $array_searchpara->carspaces = $search_session['carspaces'];
        }
        if (isset($search_session['landsize'])) {
            $array_searchpara->landsize = $search_session['landsize'];
        }
        if (isset($search_session['condition'])) {
            $array_searchpara->condition = $search_session['condition'];
        }
        if (isset($search_session['premiere'])) {
            $array_searchpara->premiere = $search_session['premiere'];
        }

        $this->getController()->render('property', array('model' => $model, 'modeltype'=>$modeltype, 'array_searchpara'=>$array_searchpara));
    }
}