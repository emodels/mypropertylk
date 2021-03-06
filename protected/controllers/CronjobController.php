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

        $featureControl = Featurecontrol::model()->find();

        $prevdate = date('Y-m-d', strtotime('-' . $featureControl->featured_property_expire_dates . ' days'));

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

    public function actionEvaluateAdvertisement(){

        $currentdate = date('Y-m-d');

        $query = "status = 1 AND expiredate <= '". $currentdate . "'";

        $advertisementCollection = Advertising::model()->findAll($query) ;

        if (count($advertisementCollection) > 0) {

            foreach ($advertisementCollection as $advertisement) {

                $advertisement->status = 2;

                if ($advertisement->save(false)) {

                    echo "(" . $advertisement->id . " Advertisement Expired..!)";
                }
            }
        } else {

            echo "No Advertisements Found..!";
        }
    }
}