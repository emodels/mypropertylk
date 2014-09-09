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

        if (isset(Yii::app()->Session['selected_district'])) {

            $selected_district = Yii::app()->Session['selected_district'];
        }

        if (isset($_POST['Selected_District'])) {

            $selected_district = $_POST['Selected_District'];
            Yii::app()->Session['selected_district'] = $selected_district;
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

        $dataProvider = new CActiveDataProvider('City', array('criteria'=>$criteria, 'pagination'=>array('pageSize'=>500)));

        if (isset($_POST['DeleteButton']))
        {
            if (isset($_POST['selectedIds']))
            {
                $criteria = new CDbCriteria;
                $criteria->addInCondition('id', $_POST['selectedIds']);

                City::model()->deleteAll($criteria);

                Yii::app()->user->setFlash('success', "Selected Cities are Deleted");
            }
        }

        $this->getController()->render('city', array('dataProvider' => $dataProvider, 'selected_district' => $selected_district));
    }
}