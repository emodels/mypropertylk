<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/wowsliderstyle.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#headline_wrapper').hide();
        $('#menu-primary-menu li').removeClass('current_page_item');
        $('#menu-primary-menu li#buy').addClass('current_page_item');
        $('a[href="http://wowslider.com"]').remove();
    });

    function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
            center: new google.maps.LatLng(44.5403, -78.5463),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options);
        var address = "<?php echo $model->number . ',' . $model->streetaddress . ','. $model->areaname ; ?>, sri lanka";
        var geocoder= new google.maps.Geocoder();
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<style>
    #map_canvas {
        width: 98%;
        height: 250px;
        border: solid 1px silver;
    }
    .list-view .summary
    {
        margin: 0 0 0px 0;
    }
    #id{
        display: none;
    }
</style>
<div class="span12">
    <div class="span8">
        <div class="span12" style="border-bottom: solid 1px silver; padding-top: 20px; font-size: 12px; color: #999999;">
            <div class="span6">
                <a href="javascript: history.go(-1)" style="color: #999999; text-decoration: none;">
                    <i class="icon-hand-left icon-gap"></i> BACK TO PROPERTY LISTINGS </a>
            </div>
            <div class="offset1 span5 hidden" style="text-align: right">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/property/viewproperty/id/<?php echo $prev_id; ?>" style="color: #999999; text-decoration: none;">
                    <i class="icon-hand-left icon-gap"></i> PREVIOUS</a> |
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/property/viewproperty/id/<?php echo $next_id; ?>" style="color: #999999; text-decoration: none;">NEXT <i class="icon-hand-right icon-gap"></i></a>
            </div>
        </div>
        <div class="span12" style="margin-top: 15px; background: -webkit-linear-gradient(#0088cc, #ffffff); background: -o-linear-gradient(#0088cc, #ffffff); background: -moz-linear-gradient(#0088cc, #ffffff); background: linear-gradient(#0088cc, #ffffff);">
            <div class="row-fluid span12" style="color: #fff; padding-top: 10px; margin-left: 0; ">
                <div class="span6" style="padding-left: 40px;">
                    Property ID : <?php echo $model->pid ?>
                </div>
                <div class="span6" style="text-align: right; padding-right: 40px; font-family: Monotype Corsiva; font-size: 26px; " >
                    <?php echo $model->pricetype0->proptype ?>
                </div>
            </div>
            <div class="span12">
                <div id="wowslider-container1" style="margin-left: 15px;">
                    <div class="ws_images">
                        <ul>
                            <?php
                            if (count($model->propertyimages)>0) {
                                foreach($model->propertyimages as $value) { ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $value->imagename; ?>" target="_blank" title="click here to enlarge" style="text-decoration: none; cursor: crosshair;">
                                            <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $value->imagename;?>">
                                        </a>
                                    </li>

                                <?php }
                            } else { ?>
                                <li>
                                    <a href="<?php echo Yii::app()->baseUrl ?> /upload/propertyimages/prop_no_img.jpg" title="enlarge" style="text-decoration: none">
                                        <img src="<?php echo Yii::app()->baseUrl ?> /upload/propertyimages/prop_no_img.jpg" >
                                    </a>
                                </li>
                            <?php }?>

                        </ul>
                    </div>
                    <div class="ws_thumbs">
                        <div>
                            <?php
                            if (count($model->propertyimages)>0) {
                                foreach($model->propertyimages as $value) { ?>
                                    <a href="#" title=""><img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $value->imagename; ?>"></a>
                                <?php }
                            } else { ?>
                                <a href="#" title=""><img src="<?php echo Yii::app()->baseUrl ?> /upload/propertyimages/prop_no_img.jpg" ></a>
                            <?php }?>
                        </div>
                    </div>
                    <div class="ws_shadow"></div>
                </div>
            </div>
        </div>
        <div class="span12" style="padding: 20px 0;">
            <div class="row-fluid span12" style="margin-left: 0">
                <div class="span8" style="padding: 10px 0;">
                    <div class="span12" style="border-bottom: solid 1px silver; ">
                        <div class="span12" style="font-size: 16px; font-weight: bold; ">
                            <?php echo $model->number . ', ' . ucwords($model->streetaddress) . ', '. ucwords($model->areaname) . ', ' . ucwords($model->townname) ?>
                        </div>
                    </div>
                    <div class="span12" style="margin-left: 0; padding-top: 10px">
                        <div class="span6">
                            <div>
                                <?php
                                $proptype_array = array();
                                foreach ($model->propertytyperelations as $value){
                                    $proptype_array[] = $value->type->proptype;
                                }
                                echo implode('&nbsp;&nbsp;|&nbsp;&nbsp;', $proptype_array);
                                ?>
                            </div>
                            <div style="float: left; padding: 10px 0;">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/beds.png"/>&nbsp;<?php echo $model->bedrooms;?>&nbsp;
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/baths.png"/>&nbsp;<?php echo $model->bathrooms;?>&nbsp;
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/parking_spaces.png"/>&nbsp;<?php echo $model->parkingspaces;?>
                            </div>
                        </div>
                        <div class="span6 listing-red" style="text-align: right"> Rs.
                            <?php if($model->type == 1 || $model->type == 2 || $model->type == 4){
                                echo $model->price;
                            } elseif ($model->type == 3 || $model->type == 5) {
                                echo $model->monthlyrent. " (monthly rental)";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="span12" style="margin-left: 0; padding: 10px 10px; background-color: #6a0812; color: #fff;">
                        Agent Details
                    </div>
                    <div class="span12" style="margin-left: 0; padding: 20px 10px;">
                        <div class="span3">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/userimages/<?php echo $model->agent0->userimage?>" class="listing-userimg"/>
                        </div>
                        <div class="span3">
                            <?php echo ucwords($model->agent0->fname) .' ' . ucwords($model->agent0->lname); ?></br>
                            <?php echo $model->agent0->email; ?></br>
                            <?php echo $model->agent0->phone; ?></br>
                            <?php echo ucwords($model->agent0->address); ?>
                        </div>
                        <?php if ($model->otheragent > 0) {
                        $otheragent = User::model()->findByPk($model->otheragent);
                        ?>
                        <div class="span3">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/userimages/<?php echo $otheragent->userimage?>" class="listing-userimg"/>
                        </div>
                        <div class="span3">
                            <?php echo ucwords($otheragent->fname) .' ' . ucwords($otheragent->lname); ?></br>
                            <?php echo $otheragent->email; ?></br>
                            <?php echo $otheragent->phone; ?></br>
                            <?php echo ucwords($otheragent->address); ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="span12" style="padding-top: 10px; margin-left: 0; text-align: justify; border-top: solid 1px silver">
                        <div>
                            <div  style="font-weight: bold;padding-bottom: 8px;">
                                <?php echo ucwords($model->headline); ?>
                            </div>
                            <?php echo $model->desc; ?>
                        </div>
                    </div>
                </div>
                <div class="span4" style="">
                    <div>
                        <ul class="nav nav-tabs" style="margin-bottom: 0; border-bottom: none">
                            <li class="active" style="background-color: transparent;">
                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/enlarge.png">&nbsp;Enlarge Map</a>
                            </li>
                            <li class="active" style="background-color: transparent;">
                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/streetview.png">&nbsp;Street View</a>
                            </li>
                        </ul>
                    </div>
                    <div id="map_canvas"></div>
                    <div style="margin-top: 20px;">
                        <div class="container row-fluid">
                            <div style="background-color: #E6E6E6; border: solid 1px silver; color: #C21814; margin: 0; line-height: 28px; font-weight: bold; border-top-left-radius: 5px; border-top-right-radius: 5px; text-align: center;">Open for Inspection Times</div>
                            <?php
                            $this->widget('zii.widgets.CListView', array(
                                'id' => 'list_inspect_time',
                                'dataProvider' => new CActiveDataProvider('Inspecttime', array('criteria'=>array('condition'=>'property=' . $model->pid , 'order' => 'date ASC'), 'pagination' => false)),
                                'itemView' => '_inspect_time_propview',
                                'summaryText'=> '',
                            ));
                            ?>
                        </div>
                    </div>
                    <div class="span12" style="border-top: solid 1px silver; border-bottom: solid 1px silver; padding-top: 10px; margin-left: 0; margin-top: 20px;">
                        <div class="span6">
                            <i class="icon-print icon_gap"></i> Print Page
                        </div>
                        <div class="span6">
                            <i class="icon-folder-open icon_gap"></i> Save Page
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/wowslider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>