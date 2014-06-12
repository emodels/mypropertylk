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

class PriceListAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $criteria = new CDbCriteria();
        $dataProvider = new CActiveDataProvider('Pricelist', array('criteria'=>$criteria));

        if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {

            if (isset($_POST['priceid']) && isset($_POST['price_value'])) {

                $pricelist = Pricelist::model()->find('priceid = ' . $_POST['priceid']);

                if (isset($pricelist)) {

                    $pricelist->price = $_POST['price_value'];

                    $pricelist->save();

                    Yii::app()->user->setFlash('success', "Price List Updated.");
                    echo 'done';
                }
            }

            Yii::app()->end();
        }

        $this->getController()->render('pricelist', array('dataProvider' => $dataProvider));
    }
}