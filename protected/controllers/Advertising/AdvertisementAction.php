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

class AdvertisementAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'DELETE' && isset($_GET['id'])) {

            $result = Advertising::model()->deleteByPk($_GET['id']);

            if ($result) {
                Yii::app()->user->setFlash('success', "Advertisement deleted.");
                echo 'done';

            }

            Yii::app()->end();
        }

        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'STATUS' && isset($_GET['id'])) {

            $advertising =  Advertising::model()->find('id=' . $_GET['id']);

            if (isset($advertising)) {

                if ($advertising->status == 0) { /*---( InActive become Active )---*/

                    $advertising->status = 1;

                } else if ($advertising->status == 1) { /*---( Active become InActive )---*/

                    $advertising->status = 0;

                } else if ($advertising->status == 3) { /*---( Pending Authorization become Active )---*/

                    $advertising->status = 1;
                }

                $advertising->save(false);

                Yii::app()->user->setFlash('success', "Advertisement Updated");
                echo 'done';

            }

            Yii::app()->end();
        }
        $this->getController()->render('advertisement');
    }
}