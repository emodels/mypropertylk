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

class PromotelistingAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $featured=0;

        if (isset($_GET['pid'])) {
            $model =  Property::model()->findByPk($_GET['pid']);
        } else {
            Yii::app()->user->setFlash('error', 'Error Page Request');
            $this->getController()->redirect(Yii::app()->baseUrl);
        }


        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'PREMIERE' && isset($_GET['pid'])) {

            if (Yii::app()->user->usertype == 0) {

                $property =  Property::model()->find('pid=' . $_GET['pid']);

                if (isset($property)) {

                    $property->pricetype = 2;

                    $property->save(false);

                    Yii::app()->user->setFlash('success', "Property Upgraded as a Premiere Property.");
                    echo 'done';

                }

            } else {

                echo 'redirect';
            }
            Yii::app()->end();
        }
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'FEATURED' && isset($_GET['pid'])) {

            $featured = Property::model()->count('pricetype=3');

            if ($featured <= 20) {

                if (Yii::app()->user->usertype == 0) {

                    $property =  Property::model()->find('pid=' . $_GET['pid']);

                    if (isset($property)) {

                        $property->pricetype = 3;

                        $property->save(false);

                        Yii::app()->user->setFlash('success', "Property Upgraded as a Featured Property.");
                        echo 'done';

                    }

                } else {

                    echo 'redirect';
                }

            } else {
                echo 'exceed';
                Yii::app()->user->setFlash('error', "Featured Property Limit can not exceeded...!");
            }
            Yii::app()->end();


        }

        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'STANDARD' && isset($_GET['pid'])) {

            $property =  Property::model()->find('pid=' . $_GET['pid']);

            if (isset($property)) {

                $property->pricetype = 1;

                $property->save(false);

                Yii::app()->user->setFlash('success', "Property Keep as a Standard Property.");
                echo 'done';

            }
            Yii::app()->end();

        }

        $this->getController()->render('promotelisting', array('model' => $model));
    }
}