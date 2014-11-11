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

class DetailAction extends CAction
{
    /*
     * Action controller for Property listing page
     */
    public function run()
    {

        if (isset($_GET['pid'])) {

            $outdoorfeatures_array = array();
            $indoorfeatures_array = array();
            $otherfeatures_array = array();

            $model = Property::model()->findByPk($_GET['pid']);

            if (isset($model)) {

                $this->getController()->pageTitle = $model->headline;

                Yii::app()->clientScript->registerMetaTag($model->desc, 'description');

                /*---( Facebook specific Meta tags )---*/
                Yii::app()->clientScript->registerMetaTag('http://www.myproperty.lk/list/detail?pid=' . $model->pid, null, null, array('property'=>'og:url'));
                Yii::app()->clientScript->registerMetaTag($model->headline, null, null, array('property'=>'og:title'));
                Yii::app()->clientScript->registerMetaTag($model->desc, null, null, array('property'=>'og:description'));

                if (count($model->propertyimages) > 0) {
                    Yii::app()->clientScript->registerMetaTag('http://www.myproperty.lk/upload/propertyimages/'. $model->propertyimages[0]->imagename, null, null, array('property'=>'og:image'));
                }

                if ($model->balcony == 1) {
                    $outdoorfeatures_array[] = "Balcony";
                }
                if($model->deck == 1){
                    $outdoorfeatures_array[] = "Deck";
                }
                if($model->oea == 1){
                    $outdoorfeatures_array[] = "Outdoor Entertainment Area";
                }
                if($model->remotegarage == 1){
                    $outdoorfeatures_array[] = "Remote Garage";
                }
                if($model->shed == 1){
                    $outdoorfeatures_array[] = "Shed";
                }
                if ($model->swimpool == 1) {
                    $outdoorfeatures_array[] = "Swimming Pool";
                }
                if($model->courtyard == 1){
                    $outdoorfeatures_array[] = "Courtyard";
                }
                if($model->fullyfenced == 1){
                    $outdoorfeatures_array[] = "Fully Fenced";
                }
                if($model->outsidespa == 1){
                    $outdoorfeatures_array[] = "Outside SPA";
                }
                if($model->securepark == 1){
                    $outdoorfeatures_array[] = "Secure Parking";
                }
                if ($model->tenniscourt == 1) {
                    $outdoorfeatures_array[] = "Tennis Court";
                }
                if($model->spabovroundeg == 1){
                    $outdoorfeatures_array[] = "Swimming Pool above Ground ";
                }
                //----indoor features-----------------
                if ($model->alarmsys == 1) {
                    $indoorfeatures_array[] = "Alarm System";
                }
                if ($model->biltinwardrobes == 1) {
                    $indoorfeatures_array[] = "Bilt in Wardrobes";
                }
                if ($model->dvs == 1) {
                    $indoorfeatures_array[] = "Ducted Vacuum System";
                }
                if ($model->gym == 1) {
                    $indoorfeatures_array[] = "Gym";
                }
                if ($model->intercom == 1) {
                    $indoorfeatures_array[] = "Intercom";
                }
                if ($model->rumpusroom == 1) {
                    $indoorfeatures_array[] = "Rumpus Room";
                }
                if ($model->workshop == 1) {
                    $indoorfeatures_array[] = "Workshop";
                }
                if ($model->broadbandinternet == 1) {
                    $indoorfeatures_array[] = "Broadband Internet";
                }
                if ($model->dishwasher == 1) {
                    $indoorfeatures_array[] = "Dishwasher";
                }
                if ($model->floorboards == 1) {
                    $indoorfeatures_array[] = "Floorboards";
                }
                if ($model->insidespa == 1) {
                    $indoorfeatures_array[] = "Inside SPA";
                }
                if ($model->paytv == 1) {
                    $indoorfeatures_array[] = "Pay TV";
                }
                if ($model->study == 1) {
                    $indoorfeatures_array[] = "Study";
                }
                //----other features-----------------
                if ($model->ac == 1) {
                    $otherfeatures_array[] = "Air Conditioned";
                }
                if ($model->heating == 1) {
                    $otherfeatures_array[] = "Heating";
                }
                if ($model->cooling == 1) {
                    $otherfeatures_array[] = "Cooling";
                }
                if ($model->solarpower == 1) {
                    $otherfeatures_array[] = "Solar Power";
                }
                if ($model->solarhotwater == 1) {
                    $otherfeatures_array[] = "Solar Hot Water";
                }
                if ($model->watertank == 1) {
                    $otherfeatures_array[] = "Water Tank";
                }

                $this->getController()->render('detail', array('model'=>$model, 'outdoorfeatures_array' => $outdoorfeatures_array,  'indoorfeatures_array' => $indoorfeatures_array, 'otherfeatures_array' => $otherfeatures_array, 'prev_id'=>0, 'next_id'=>0));
            }

        }
    }
}