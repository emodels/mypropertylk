<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: CityAction.php
 * Last Update Date: 09-09-2014
 *
 * **This is the Admin City Action Page.
 */

class CityAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $selected_district = '';
        $selected_district_code = '';
        $selected_status = 0;
        $activated_city_list = array();

        if (isset(Yii::app()->Session['selected_district'])) {

            $selected_district = Yii::app()->Session['selected_district'];
        }

        if (isset(Yii::app()->Session['selected_status'])) {

            $selected_status = Yii::app()->Session['selected_status'];
        }

        if (isset($_POST['Selected_District'])) {

            $selected_district = $_POST['Selected_District'];
            Yii::app()->Session['selected_district'] = $selected_district;
        }

        if (isset($_POST['Selected_Status'])) {

            $selected_status = (($_POST['Selected_Status'] == '') ? 0 : $_POST['Selected_Status']);
            Yii::app()->Session['selected_status'] = $selected_status;
        }

        if ($selected_district != '') {

            $model = District::model()->findByPk($selected_district);

            if (isset($model)) {

                $selected_district_code = $model->code;
            }
        }

        $criteria = new CDbCriteria();
        $criteria->select = array('t.id, t.name, IFNULL((SELECT name from district as ds WHERE ds.code = t.district LIMIT 1), "N/A") as district');
        $criteria->order = 'district, name';

        if ($selected_district_code != '') {

            $criteria->addCondition('district = ' . $selected_district_code);
        }

        $criteria->addCondition('status = ' . $selected_status);

        $dataProvider = new CActiveDataProvider('City', array('criteria'=>$criteria, 'pagination'=>array('pageSize'=>500)));

        if (isset($_POST['ActivationButton']))
        {

            $csv = array();

            // check there are no errors
            if($_FILES['csv']['error'] == 0){

                $tmpName = $_FILES['csv']['tmp_name'];

                $row = 1;
                if (($handle = fopen($tmpName, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        //echo "<p> $num fields in line $row: <br /></p>\n";
                        $row++;
                        for ($c=0; $c < $num; $c++) {
                            //echo $data[$c] . "<br />\n";
                            $csv[] = $data[$c];
                        }
                    }
                    fclose($handle);
                }
            }

            if (count($csv) > 0 && $selected_district_code != '') {

                foreach ($csv as $value) {

                    $city =  City::model()->find("LCASE(name) = '" . $value . "' AND district = " . $selected_district_code);

                    if (isset($city)) {

                        $city->status = 1;
                        $city->save();

                        $activated_city_list[] = $city;
                    }
                }

                Yii::app()->user->setFlash('success', "CSV based City status update completed");
            }
        }

        $this->getController()->render('city', array('dataProvider' => $dataProvider, 'selected_district' => $selected_district, 'selected_status' => $selected_status, 'activated_city_list' => $activated_city_list));
    }
}