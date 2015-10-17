<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
            center: new google.maps.LatLng(44.5403, -78.5463),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options);
        geoLocation("ibm building near Navam Mawatha, Colombo, Sri Lanka", map);
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

<style type="text/css">
    #map_canvas {
        width: 98%;
        height: 250px;
        border: solid 1px silver;
    }
    .list-view .summary {
        display: none;
    }

    .list-view .empty {
        display: none;
    }

</style>
<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="content-wrapper clearfix">
                        <div class="span9">
                            <div class="content-holder">
                                <div id="title-listing" class="container">
                                    <div class="property-list-title">Contact Us</div>
                                </div>
                                <div class="span10 offset1">
                                    <?php if(Yii::app()->user->hasFlash('contact')): ?>

                                        <div class="flash-success">
                                            <?php echo Yii::app()->user->getFlash('contact'); ?>
                                        </div>

                                    <?php else: ?>

                                        <p>
                                            If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
                                        </p>

                                        <div class="form">

                                            <?php $form=$this->beginWidget('CActiveForm', array(
                                                'id'=>'contact-form',
                                                'enableClientValidation'=>true,
                                                'clientOptions'=>array(
                                                    'validateOnSubmit'=>true,
                                                ),
                                            )); ?>

                                            <p class="note">Fields with <span class="required">*</span> are required.</p>

                                            <?php echo $form->errorSummary($model); ?>

                                            <div class="row">
                                                <?php echo $form->labelEx($model,'name'); ?>
                                                <?php echo $form->textField($model,'name'); ?>
                                                <?php echo $form->error($model,'name'); ?>
                                            </div>

                                            <div class="row">
                                                <?php echo $form->labelEx($model,'email'); ?>
                                                <?php echo $form->textField($model,'email'); ?>
                                                <?php echo $form->error($model,'email'); ?>
                                            </div>

                                            <div class="row">
                                                <?php echo $form->labelEx($model,'subject'); ?>
                                                <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
                                                <?php echo $form->error($model,'subject'); ?>
                                            </div>

                                            <div class="row">
                                                <?php echo $form->labelEx($model,'body'); ?>
                                                <?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
                                                <?php echo $form->error($model,'body'); ?>
                                            </div>

                                            <?php if(CCaptcha::checkRequirements()): ?>
                                                <div class="row">
                                                    <?php echo $form->labelEx($model,'verifyCode'); ?>
                                                    <div>
                                                        <?php $this->widget('CCaptcha'); ?>
                                                        <?php echo $form->textField($model,'verifyCode'); ?>
                                                    </div>
                                                    <div class="hint text-small"><i>(Please enter the letters as they are shown in the image above.
                                                        <br/>Letters are not case-sensitive.)</i></div>
                                                    <?php echo $form->error($model,'verifyCode'); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="row buttons" style="margin-top: 15px;">
                                                <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>&nbsp;
                                            </div>

                                            <?php $this->endWidget(); ?>

                                        </div><!-- form -->

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="span3" style="margin-top: 30px;">
                            <div class="row-fluid">
                                <div class="span12">
                                    <b>Address : </b>
                                    <div class="offset1 span10" style="padding-bottom: 20px;">
                                        Level 3, IBM Building,<br/> No 48,
                                        Nawam Mawatha,<br/>
                                        Colombo 2,<br/>
                                        Sri Lanka.
                                    </div>
                                </div>
                                <div class="span12">
                                    <b>Mobile : </b>
                                    <div class="offset1 span10" style="padding-bottom: 20px;">
                                        +94 777 348 648
                                    </div>
                                </div>
                                <div class="span12">
                                    <b>Office Phone : </b>
                                    <div class="offset1 span10" style="padding-bottom: 20px;">
                                        +94 117 444 115
                                    </div>
                                </div>
                                <div class="span12">
                                    <b>e-Mail : </b>
                                    <div class="offset1 span10"  style="padding-bottom: 20px;">
                                        <a href="mailto:info@myproperty.lk">info@myproperty.lk</a>
                                    </div>
                                </div>
                                <div class="span12">
                                    <b>Our Location : </b>
                                    <div id="map_canvas"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

