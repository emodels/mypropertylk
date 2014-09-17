<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: SearchJSONAction.php
 * Last Update Date: 11-09-2013
 *
 * **This is the Search JSON Action Page.
 */

class SearchjsonAction extends CAction
{
    /*
     * Action controller for Property listing page
     */
    public function run()
    {
        if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest) {

            if (isset($_POST['search'])) {

                Yii::app()->session['search'] = $_POST['search'];

                echo 'done';
                Yii::app()->end();
            }
        }

        $array_city = array();

        if (isset($_GET['query']) && isset($_GET['district'])) {

            $district = District::model()->findByPk($_GET['district']);

            $criteria = new CDbCriteria();
            $criteria->select = array('name');
            $criteria->distinct = true;
            $criteria->order = 'name';
            $criteria->addCondition('district = ' . $district->code);
            $criteria->addCondition('status = 1');
            $criteria->addSearchCondition('name', $_GET['query'] . '%', false);

            $cities = City::model()->findAll($criteria);

            foreach ($cities as $city) {

                $array_city[] = $city->name;
            }

            header('Content-Type: application/json');
            echo json_encode($array_city);
            exit();
        }

        if (isset($_GET['query'])) {

            $criteria = new CDbCriteria();
            $criteria->select = array('name');
            $criteria->distinct = true;
            $criteria->order = 'name';
            $criteria->addCondition('status = 1');
            $criteria->addSearchCondition('name', $_GET['query'] . '%', false);

            $cities = City::model()->findAll($criteria);

            foreach ($cities as $city) {

                $array_city[] = $city->name;
            }

            header('Content-Type: application/json');
            echo json_encode($array_city);
            exit();

        } else if (isset($_GET['district'])) {

            $district = District::model()->findByPk($_GET['district']);

            $criteria = new CDbCriteria();
            $criteria->select = array('name');
            $criteria->distinct = true;
            $criteria->order = 'name';
            $criteria->addCondition('status = 1');
            $criteria->addCondition('district = ' . $district->code);

            $cities = City::model()->findAll($criteria);

            foreach ($cities as $city) {

                $array_city[] = $city->name;
            }

            header('Content-Type: application/json');
            echo json_encode($array_city);
            exit();

        } else {

            $criteria = new CDbCriteria();
            $criteria->select = array('name');
            $criteria->distinct = true;
            $criteria->order = 'name';
            $criteria->addCondition('status = 1');

            $cities = City::model()->findAll($criteria);

            foreach ($cities as $city) {

                $array_city[] = $city->name;
            }

            header('Content-Type: application/json');
            echo json_encode($array_city);
            exit();
        }
    }
}