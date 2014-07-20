<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/wowsliderstyle.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=lankahotelguide"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#headline_wrapper').hide();
        $('#menu-primary-menu li').removeClass('current_page_item');
        $('#menu-primary-menu li#buy').addClass('current_page_item');
        $('a[href="http://wowslider.com"]').remove();

        $("#wowslider-container1").mouseover(function() {
            $(this).stop();
            return false;
        });

        //On mouseout start the slider
        $("#wowslider-container1").mouseout(function() {
            loop();
        });

        $('input[field_required]').blur(function () {
            if ($(this).val()=='') {
                $(this).next('errorMessage').show();
            } else {
                $(this).next('errorMessage').hide();
            }
        });

        $('#btn_email_agent').click(function (e) {

            e.preventDefault();

            var isValid = true;

            if ($('#name').val()=='') {
                $('#name_em_').show();
                isValid = false;
            } else {
                $('#name_em_').hide();
            }

            if ($('#email').val()=='') {
                $('#email_em_').show();
                isValid = false;
            } else {
                $('#email_em_').hide();
            }

            if (isValid == true) {

                $.ajax({
                    type: "POST",
                    url: '<?php echo Yii::app()->request->baseUrl; ?>/list/emailagent',
                    data: $('#emailagent-frm').serialize(),
                    success: function(data){
                        if (data == 'done'){
                            window.document.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/list/detail/pid/<?php echo $model->pid; ?>');
                        }
                    }
                });
            }

        });
    });

    function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
            center: new google.maps.LatLng(44.5403, -78.5463),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options);
        <?php
            $address = "";

            if ($model->number != "") {

                $address .= $model->number . ", ";
            }

            if ($model->streetaddress != "") {

                $address .= ucwords($model->streetaddress) . ", ";
            }

            if ($model->areaname != ""){

                $address .= ucwords($model->areaname) . ", ";
            }

            if ($model->townname != "") {

                $address .= ucwords($model->townname);
            }

         ?>

        if (geoLocation("<?php echo $address; ?>, Sri Lanka", map) == false){

            geoLocation("<?php echo $model->district0->name; ?>, Sri Lanka", map);
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    function geoLocation(address, map) {

        var returnValue = false;
        var address = address;
        var geocoder = new google.maps.Geocoder();

        geocoder.geocode( { 'address': address}, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {

                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });

                returnValue = true;

            } else {

                returnValue = false;
            }
        });

        return returnValue;
    }
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
    #wowslider-container1 .ws_thumbs img{
        max-height: 80px !important;
    }
</style>
<div class="span12">
    <div class="offset1 span8">
        <div class="span10" style="border-bottom: solid 1px silver; padding-top: 20px; font-size: 12px; color: #999999;">
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
        <div class="span10" style="margin-top: 15px; background: -webkit-linear-gradient(#0088cc, #ffffff); background: -o-linear-gradient(#0088cc, #ffffff); background: -moz-linear-gradient(#0088cc, #ffffff); background: linear-gradient(#0088cc, #ffffff);">
            <div class="row-fluid span12" style="color: #fff; padding-top: 10px; margin-left: 0; ">
                <div class="span6" style="padding-left: 40px;">
                    Property ID : <?php echo $model->pid ?>
                </div>
                <div class="span6" style="text-align: right; padding-right: 40px; font-family: Monotype Corsiva; font-size: 26px; " >
                    <?php echo $model->pricetype0->proptype ?>
                </div>
            </div>
            <div class="span10">
                <div id="wowslider-container1" style="margin-left: 15px;">
                    <div class="ws_images">
                        <ul>
                            <?php
                            if (count($model->propertyimages)>0) {
                                foreach($model->propertyimages as $value) {
                            ?>
                                        <li>
                                            <a href="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $value->imagename; ?>" target="_blank" title="click here to enlarge" style="text-decoration: none; cursor: crosshair;">
                                                <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $value->imagename;?>">
                                            </a>
                                        </li>
                                <?php
                                }
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
                                foreach($model->propertyimages as $value) {
                            ?>
                                        <a href="#" title=""><img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $value->imagename; ?>"></a>
                                <?php
                                }
                            } else { ?>
                                <a href="#" title=""><img src="<?php echo Yii::app()->baseUrl ?> /upload/propertyimages/prop_no_img.jpg"></a>
                            <?php }?>
                        </div>
                    </div>
                    <div class="ws_shadow"></div>
                </div>
            </div>
        </div>
        <div class="span10" style="padding: 20px 0;">
            <div class="row-fluid span12" style="margin-left: 0">
                <div class="span8" style="padding: 10px 0;">
                    <div class="span12" style="border-bottom: solid 1px silver; ">
                        <div class="span12" style="font-size: 16px; font-weight: bold; ">
                            <?php
                                $address = "";

                                if ($model->number != "") {

                                    $address .= $model->number . ", ";
                                }

                                if ($model->streetaddress != "") {

                                    $address .= ucwords($model->streetaddress) . ", ";
                                }

                                if ($model->areaname != ""){

                                    $address .= ucwords($model->areaname) . ", ";
                                }

                                if ($model->townname != "") {

                                    $address .= ucwords($model->townname);
                                }

                             echo $address;
                             ?>
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
                                echo Yii::app()->numberFormatter->format("#,##0", $model->price);
                            } elseif ($model->type == 3 || $model->type == 5) {
                                echo Yii::app()->numberFormatter->format("#,##0", $model->monthlyrent) . " (monthly rental)";
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
                            <?php echo $model->agent0->phone; ?></br>
                            <?php echo ucwords($model->agent0->address); ?>
                            <?php
                            if ($model->agent0->email != "") { ?>
                            <div style="padding-top:5px ">
                                <a href="#email_agent_model" class="btn btn-primary" data-toggle="modal">Email Agent</a>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if ($model->otheragent > 0) {
                        $otheragent = User::model()->findByPk($model->otheragent);
                        ?>
                        <div class="span3">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/userimages/<?php echo $otheragent->userimage?>" class="listing-userimg"/>
                        </div>
                        <div class="span3">
                            <?php echo ucwords($otheragent->fname) .' ' . ucwords($otheragent->lname); ?></br>
                            <?php echo $otheragent->phone; ?></br>
                            <?php echo ucwords($otheragent->address); ?>
                            <?php
                            if ($otheragent->email != "") { ?>
                                <br/><a href="#email_agent_model" class="btn btn-primary">Email Agent</a>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row-fluid span12" style="padding-top: 10px; margin-left: 0; text-align: justify; border-top: solid 1px silver">
                        <div class=" row-fluid span12">
                            <div  style="font-weight: bold;padding-bottom: 8px;">
                                <?php echo ucwords($model->headline); ?>
                            </div>
                            <div>
                                <?php echo $model->desc; ?>
                            </div>
                            <div style="padding: 10px 0;">
                                <?php echo $model->otherfeatures; ?>
                            </div>
                        </div>
                        <b>General Features:</b>
                        <div class="row-fluid span12">
                            <div class="span6">
                                <?php
                                if ($model->ensuites != 0){
                                    echo "Ensuites: " . $model->ensuites . "<br/>";
                                }
                                if ($model->toilets != 0){
                                    echo "Toilets: " . $model->toilets . "<br/>";
                                }
                                if ($model->parkgaragespaces != 0){
                                    echo "Parking Garage Spaces: " . $model->parkgaragespaces . "<br/>";
                                }
                                if ($model->parkcarpetspaces != 0){
                                    echo "Park Carpet Spaces: " . $model->parkcarpetspaces . "<br/>";
                                }
                                if ($model->parkopenspaces != 0){
                                    echo "Parking Open Spaces: " . $model->parkopenspaces . "<br/>";
                                }
                                if ($model->tenuretype != ""){
                                    echo "Tenure Type: " . $model->tenuretype . "<br/>";
                                }
                                if ($model->building != ""){
                                    echo "Building: " . $model->building . "<br/>";
                                }
                                if ($model->parkcomment != ""){
                                    echo "Parking Comment: " . $model->parkcomment . "<br/>";
                                }

                                ?>
                            </div>
                            <div class="span6">
                                <?php
                                if ($model->livingarea != 0){
                                    echo "Living Area: " . $model->livingarea . "<br/>";
                                }
                                if ($model->housesize != 0){
                                    echo "House Size: " . $model->housesize . " " ;
                                    if ($model->housesquares == 1)  {
                                        echo  "f²";
                                    } elseif ($model->housesquares == 2){
                                        echo "m²";
                                    }
                                    echo "<br/>";
                                }
                                if ($model->landsize){
                                    echo "Landsize: " . $model->landsize . " ";
                                    if ($model->landsquares == 1){
                                        echo "f²";
                                    } else if ($model->landsquares == 2){
                                        echo "m²";
                                    } else if ($model->landsquares == 3){
                                        echo "Hec";
                                    } else if ($model->landsquares == 4){
                                        echo "Acres";
                                    }
                                    echo "<br/>";
                                }
                                if ($model->floorarea){
                                    echo "Floor Area: " . $model->floorarea . " " . $model->floorsquares = 1 ? "f²" : "m²";
                                    echo "<br/>";
                                }
                                if ($model->zoning != ""){
                                    echo "Zoning: " . $model->zoning . "<br/>";
                                }
                                if ($model->outgoings != ""){
                                    echo "Outgoings: " . $model->outgoings . "<br/>";
                                }
                                if ($model->eer != 0){
                                    echo "Energy Efficiency Rate: " . $model->eer . "<br/>";
                                }
                                ?>
                            </div>
                        </div>
                        <?php if (count($outdoorfeatures_array) > 0 ){?>
                        <div class="row-fluid span12" style="border-top: solid 1px silver; margin-top: 10px; margin-left: 0;">
                            <h6 style="color: green"><b>Outdoor Features</b></h6>
                            <?php
                                echo implode('&nbsp;&nbsp;|&nbsp;&nbsp;', $outdoorfeatures_array);
                            ?>
                        </div>
                        <?php }
                        if (count($indoorfeatures_array) > 0){
                        ?>

                        <div class="row-fluid span12" style="border-top: solid 1px silver; margin-top: 10px;  margin-left: 0;">
                            <h6 style="color: #c1381c"><b>Intdoor Features</b></h6>
                            <?php
                            echo implode('&nbsp;&nbsp;|&nbsp;&nbsp;', $indoorfeatures_array);
                            ?>
                        </div>
                        <?php }
                        if (count($otherfeatures_array) > 0){
                        ?>

                        <div class="row-fluid span12" style="border-top: solid 1px silver; margin-top: 10px;  margin-left: 0;">
                            <h6 style="color: #25a6df"><b>Other Features</b></h6>
                            <?php
                            echo implode('&nbsp;&nbsp;|&nbsp;&nbsp;', $otherfeatures_array);
                            ?>
                        </div>
                        <?php }
                        if ($model->vediourl != ""){
                            ?>

                            <div class="row-fluid span12" style="border-top: solid 1px silver; margin-top: 10px;  margin-left: 0;">
                                <h6 style="color: #4b6bcb"><b>Vedio Url</b></h6>
                                <a href="<?php echo $model->vediourl ?>" target="_blank">
                                    <?php
                                    echo $model->vediourl;
                                    ?>
                                </a>
                            </div>
                        <?php }
                        if ($model->onlinetour1 != ""){
                            ?>

                            <div class="row-fluid span12" style="border-top: solid 1px silver; margin-top: 10px;  margin-left: 0;">
                                <h6 style="color: #2ecb46"><b>Online Tour 1</b></h6>
                                <a href="<?php echo $model->onlinetour1 ?>" target="_blank">
                                    <?php
                                    echo $model->onlinetour1;
                                    ?>
                                </a>
                            </div>
                        <?php }
                        if ($model->onlinetour2 != ""){
                            ?>

                            <div class="row-fluid span12" style="border-top: solid 1px silver; margin-top: 10px;  margin-left: 0;">
                                <h6 style="color: #ff931f"><b>Online Tour 2</b></h6>
                                <a href="<?php echo $model->onlinetour2 ?>" target="_blank">
                                    <?php
                                    echo $model->onlinetour2;
                                    ?>
                                </a>
                            </div>
                        <?php } ?>

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
                            $dataProvider = new CActiveDataProvider('Inspecttime', array('criteria'=>array('condition'=>'property=' . $model->pid , 'order' => 'date ASC'), 'pagination' => false));

                            if ($dataProvider->getTotalItemCount() > 0) {
                                $this->widget('zii.widgets.CListView', array(
                                    'id' => 'list_inspect_time',
                                    'dataProvider' => new CActiveDataProvider('Inspecttime', array('criteria'=>array('condition'=>'property=' . $model->pid , 'order' => 'date ASC'), 'pagination' => false)),
                                    'itemView' => '_inspect_time_propview',
                                    'summaryText'=> '',
                                ));
                            } else {
                                echo "<div style='padding-top: 10px; padding-left: 10px;'>";
                                echo "No inspections are currently scheduled. <br/><a href='' >Contact the agent </a> to arrange an appointment";
                                echo "</div>";
                            }

                            ?>
                        </div>
                    </div>
                    <div class="span12" style="border-top: solid 1px silver; border-bottom: solid 1px silver; padding: 10px 0; text-align: center; margin-left: 0; margin-top: 20px;">
                        <div class="addthis_sharing_toolbox"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--( Email Agent Model window )-->
<form id="emailagent-frm">
    <div class="form">
        <div id="email_agent_model" class="modal hide fade container-fluid" style="padding-left: 0px; padding-right: 0px" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 id="myModalLabel">Contact Agent for Property #<?php echo $model->pid; ?></h5>
            </div>
            <div class="modal-body row-fluid span12" style="margin: 0px">
                <div class="control-group" style="display: none;">
                    <?php echo CHtml::textField('Enquery[pid]', $model->pid, array('class'=>'span11')); ?>
                </div>
                <div class="control-group">
                    <?php echo CHtml::textField('Enquery[name]','', array('placeholder'=>'Name','class'=>'span11','field_required'=>'field_required')); ?>
                    <div class="errorMessage hide" id="name_em_">Name cannot be blank.</div>
                </div>
                <div class="control-group">
                    <?php echo CHtml::textField('Enquery[email]','', array('placeholder'=>'Email','class'=>'span11','field_required'=>'field_required')); ?>
                    <div class="errorMessage hide" id="email_em_">Email cannot be blank.</div>
                </div>
                <div class="control-group">
                    <?php echo CHtml::textField('Enquery[phone]','', array('placeholder'=>'Phone','class'=>'span11')); ?>
                </div>
                <div class="control-group">
                    <?php echo CHtml::dropDownList('Enquery[about_me]','', array('I own my own home','I am renting','I have recently sold','I am a first home buyer','I am looking to invest','I am monitoring the market'), array('empty'=>'About Me','class'=>'span11')); ?>
                </div>
                <div class="control-group">
                    <?php echo CHtml::textArea('Enquery[comment]','', array('placeholder'=>'Comments','class'=>'span11')); ?>
                </div>
                <div class="control-group">
                    <label>I would like to:</label>
                </div>
                <div>
                    <label class="checkbox" style="font-weight: normal">
                        <?php echo CHtml::checkBox('Enquery[get_price]', false,array('value'=>1, 'uncheckValue'=>0));?>  Get an indication of price
                    </label>
                </div>
                <div>
                    <label class="checkbox" style="font-weight: normal">
                        <?php echo CHtml::checkBox('Enquery[sale_contract]', false,array('value'=>1, 'uncheckValue'=>0));?>  Obtain the contract of sale
                    </label>
                </div>
                <div>
                    <label class="checkbox" style="font-weight: normal">
                        <?php echo CHtml::checkBox('Enquery[inspect_property]', false,array('value'=>1, 'uncheckValue'=>0));?>  Inspect the property
                    </label>
                </div>
                <div>
                    <label class="checkbox" style="font-weight: normal">
                        <?php echo CHtml::checkBox('Enquery[simillar_properties]', false,array('value'=>1, 'uncheckValue'=>0));?>  Be contacted about similar properties
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <a href="" id="btn_email_agent" class="btn btn-primary">Send Email</a>
            </div>
        </div>
    </div>
</form>
<!--( // Email Agent Model window )-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/wowslider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>