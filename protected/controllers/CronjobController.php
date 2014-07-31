<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: CronjobController.php
 *
 ***This is the PropertyController Controller Page.
 */

class CronjobController extends Controller
{
    public function actionEvaluateAndDowngradeFeaturedProperties(){

        $prevdate = date('Y-m-d', strtotime('-7 days'));

        $query = "pricetype = 3 AND entrydate < '". $prevdate . "'";

        $featuredPropertyCollection = Property::model()->findAll($query) ;

        if (count($featuredPropertyCollection) > 0) {

            foreach ($featuredPropertyCollection as $property) {

                $property->pricetype = 2;

                if ($property->save(false)) {

                    echo "(" . $property->pid . " Property Changed as Premier Type)";
                }
            }
        } else {

            echo "No Properties Found..!";
        }
    }
}