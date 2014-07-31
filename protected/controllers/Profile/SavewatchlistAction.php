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

class SavewatchlistAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        /*---( Handle page requests via AJAX calls )---*/
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'SAVE' && isset($_GET['id'])) {

            if (Yii::app()->user->isGuest){

                $property = Property::model()->findByPk($_GET['id']);

                if (isset($property)) {

                    $redirectURL = '';
                    switch ($property->type){

                        case 1: /*---( Home Sales )---*/
                        case 2: /*---( Land Sales )---*/

                            $redirectURL = Yii::app()->baseUrl . '/list/property/type/buy';
                            break;

                        case 3: /*---( Home Rental )---*/

                            $redirectURL = Yii::app()->baseUrl . '/list/property/type/rent';
                            break;

                        case 4: /*---( Commercial Sales )---*/

                            $redirectURL = Yii::app()->baseUrl . 'list/commercial/type/sale';
                            break;

                        case 5: /*---( Commercial Leased )---*/

                            $redirectURL = Yii::app()->baseUrl . 'list/commercial/type/lease';
                            break;
                    }
                }


                Yii::app()->user->setReturnUrl($redirectURL);
                echo "redirect";

            } else {

                $this->SaveWatch();
                echo 'done';
            }

            Yii::app()->end();
        }
    }

    public function SaveWatch(){

        $watchlist = Watchlist::model()->find('propertyid = ' . $_GET['id'] . ' AND userid = ' . Yii::app()->user->id);

        if (isset($watchlist)) {

            $watchlist->delete();

        } else {

            $model = new Watchlist();

            $model->userid = Yii::app()->user->id;
            $model->propertyid = $_GET['id'];

            if($model->save()){

                return true;
            }
            else{

                print_r($model->getErrors());
            }
        }
    }
}