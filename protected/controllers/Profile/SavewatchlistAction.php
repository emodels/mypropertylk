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
        if (Yii::app()->request->isAjaxRequest && isset($_GET['mode']) && $_GET['mode'] == 'SAVE' && isset($_GET['id'])) {

            if (Yii::app()->user->isGuest){

                Yii::app()->user->setReturnUrl(Yii::app()->request->requestUri);
                $this->getController()->redirect(Yii::app()->baseUrl . '/login');

            } else {

                $watchlist = Watchlist::model()->find('propertyid = ' .$_GET['id'] . 'AND userid = ' . Yii::app()->user->id);

                if (isset($watchlist)) {

                    Yii::app()->user->setFlash('error', "Property Already Added to Your Watch List...!");
                } else {

                    $model = new Watchlist();

                    $model->userid = Yii::app()->user->id;
                    $model->propertyid = $_GET['id'];

                    if($model->save()){
                        Yii::app()->user->setFlash('success', "Property Successfully Added to you Watch List...!");
                        echo 'done';
                    }
                    else{
                        print_r($model->getErrors());
                        Yii::app()->user->setFlash('error', 'Error Saving Record');
                    }
                }

            }

            Yii::app()->end();
        }

        $this->getController()->render('watchlist');
    }
}