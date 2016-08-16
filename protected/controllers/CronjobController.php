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

    public function actionOptimizePropertyImages() {

        /*---( Stop page scripting timeout )---*/

        set_time_limit(0);
        ignore_user_abort(1);

        $dir = Yii::getPathOfAlias('webroot') . '/upload/propertyimages';
        $dir_original = $dir . '/original';

        if (is_dir($dir)) {

            if ($dh = opendir($dir)) {

                while (($file = readdir($dh)) !== false) {

                    if (strpos($file, 'image_') !== false) {

                        if (Utility::getFileSize($dir . '/'. $file) > 30) {

                            if (!file_exists($dir_original . '/' . $file)) {

                                /*---( Save Copy to Original Folder )---*/

                                if (copy($dir . '/'. $file, $dir_original . '/' . $file)) {

                                    Utility::compressImage($dir . '/' . $file, $dir . '/' . $file, 25);

                                    echo $file . '<br><br>';
                                }
                            }
                        }
                    }
                }

                closedir($dh);
            }
        }
    }
}