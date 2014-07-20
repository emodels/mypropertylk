
<script type="text/javascript">
    $(document).ready(function(){
        $('#menu-primary-menu li').removeClass('current_page_item');
        $('#menu-primary-menu li#commercial').addClass('current_page_item');

        if (<?php echo $_GET['type']?> == all) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#all').addClass('active');
        } else if (<?php echo $_GET['type']?> == sale) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#sale').addClass('active');
        } else if (<?php echo $_GET['type']?> == lease) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#lease').addClass('active');
        } else if (<?php echo $_GET['type']?> == sold) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#sold').addClass('active');
        }

    });
</script>
<style>
    .nav-tabs {
        border-bottom: 1px solid #fcb30f;
    }
    .nav-tabs a{
        color: #131326;
        background-color:  #f7f7f9;
        border: 1px solid #fcb30f !important;
        border-bottom-color: #fcb30f;
    }
    .nav-tabs > .active > a,
    .nav-tabs > .active > a:focus {
        color: #fff;
        background-color: #FFB013;
        border: 1px solid #fcb30f !important;
        border-bottom-color: #fcb30f!important;
    }
    .nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
        color: #fff;
        background-color: #FFB013;
        border: 1px solid #fcb30f !important;
        border-bottom-color: #fcb30f!important;
    }


    .list-view .summary {
        display: none;
    }

    .list-view .empty {
        display: none;
    }
</style>
<div class="content-wrapper clearfix">
    <div class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'commercial-form',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'afterValidate' => 'js:formSend',
            ),
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <div class="span9">
                            <div class="container row-fluid">
                                <div class="span12">
                                    <div id="title-listing">
                                        <div class="property-list-title">Commercial Properties</div>
                                    </div>
                                    <div>
                                        <ul class="nav nav-tabs">
                                            <li id="all" class="active">
                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/all">All</a>
                                            </li>
                                            <li id="sale"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/sale">For Sale</a></li>
                                            <li id="lease"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/lease">For Lease</a></li>
                                            <li id="sold"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/sold">Sold / Leased</a></li>
                                        </ul>
                                    </div>
                                    <div class="row-fluid">
                                        <?php
                                        if($_GET['type'] == "all"){
                                            $condition = '(type = 4 OR type = 5 ) AND status = 1';
                                        } elseif($_GET['type'] == "sale"){
                                            $condition = 'type = 4 AND status = 1';
                                        } elseif($_GET['type'] == "lease"){
                                            $condition = 'type = 5 AND status = 1';
                                        } elseif($_GET['type'] == "sold"){
                                            $condition = '(type = 4 OR type = 5 ) AND status = 2';
                                        }

                                        $dataprovider = new CActiveDataProvider('Property', array('criteria'=>array('condition'=> $condition,'order' => 'entrydate DESC'),'pagination'=>array('pageSize'=>10)));

                                        if ($dataprovider->totalItemCount == 0) {

                                            echo '<div class="alert alert-danger" style="font-size: 16px;">';
                                            echo "No Property found....!";
                                            echo '</div>';
                                        }

                                        /*---( Middle Advertisements )---*/
                                        $condition_middle_ads = '(page = 5 AND (size = 8) AND status = 1) AND expiredate >= CURDATE()';

                                        $array_advertisements_used = array();
                                        $array_advertisements_all = Advertising::model()->findAll(array('condition'=> $condition_middle_ads,'order' => 'entrydate DESC'));

                                        Yii::app()->session['utilized_middle_advertisements'] = $array_advertisements_used;

                                        function loadMiddleAdvertisement($adv_All){

                                            $adv_used = Yii::app()->session['utilized_middle_advertisements'];

                                            $nextAdvID = 0;

                                            foreach ($adv_All as $value) {

                                                if (!in_array($value->id, $adv_used)) {

                                                    $adv_used[] = $value->id;
                                                    $nextAdvID = $value->id;

                                                    Yii::app()->session['utilized_middle_advertisements'] = $adv_used;

                                                    break;
                                                }
                                            }

                                            $next_Advertisement = Advertising::model()->findByPk($nextAdvID);

                                            return Yii::app()->controller->renderPartial('_ads_list_view', array('data'=>$next_Advertisement), true);
                                        }
                                        /*---( //end of Middle Advertisements )---*/

                                        $this->widget('zii.widgets.CListView', array(
                                            'id' => 'list_commercial',
                                            'dataProvider'=>$dataprovider,
                                            'itemView' => '_commercial_list_view',
                                            'viewData' => array('adv_All' => $array_advertisements_all),
                                            'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>'
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Advertiesments--->
                        <div class="span3 hidden-phone">
                            <div class="row-fluid">
                                <?php

                                $condition = '(page = 5 AND (size = 1 OR size = 3 OR size = 5) AND status = 1) AND expiredate >= CURDATE()';

                                $this->widget('zii.widgets.CListView', array(
                                    'id' => 'list_advertisement',
                                    'dataProvider'=>new CActiveDataProvider('Advertising', array('criteria'=>array('condition'=> $condition,'order' => 'entrydate DESC'),'pagination'=>false)),
                                    'itemView' => '_ads_list_view'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div><!-- /.content-wrapper -->
