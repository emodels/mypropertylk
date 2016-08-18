<script type="text/javascript">
    $(document).ready(function(){
       
       $('#lnk_list li').each(function(){
          $(this).removeClass('active'); 
       });
       $('#lnk_contact').addClass('active');
    });
</script>

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
       /* width: 200px;
        height: 250px;
        border: solid 1px silver;*/
       display: inline-block;
	width: 100%;
	height: 450px;
	position: relative;
	border: none;
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
    
        
    
    <div class="sub-banner">
    <div class="overlay">
      <div class="container">
        <h1>CONTACT US</h1>
         <ol class="breadcrumb">
          <li class="pull-left">CONTACT us</li>
          <li><a href="<?php echo Yii::app()->request->baseUrl;?>/">Home</a></li>
          <li class="active">CONTACT Us</li>
        </ol>
      </div>
    </div>
  </div>


  <!--======= CONTACT =========-->
  <section class="contact" style="height:1660px">

    <!--======= CONTACT INFORMATION =========-->
    <div class="contact-info">
      <div class="container">
        <!--======= CONTACT =========-->
        <ul class="row con-det">

          <!--======= ADDRESS =========-->
          <li class="col-md-4"> <i class="fa fa-map-marker"></i>
            <p>Level 3, IBM Building, 48, Nawam Mawatha,<br> Colombo 02, Sri Lanka<p>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/contact#map_canvas" class="font-montserrat">Show map </a> </li>

          <!--======= EMAIL =========-->
          <li class="col-md-4"> <i class="fa fa-phone"></i>
            <p>Tel    : +94 112 314 100</p>
            <p>Mobile : +94 777 348 648</p>
          </li>

          <!--======= ADDRESS =========-->
          <li class="col-md-4"> <i class="fa fa-clock-o"></i>
            <p>Week days  : 9:00 Am to 5:00 PM</p>
          </li>
        </ul>

        <!--======= CONTACT FORM =========-->

      </div>
    </div>
    <div class="contact-form">
      <div class="container">

        <!--======= TITTLE =========-->
        <div class="tittle"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-top.png" alt="">
          <h3>feel free to communicate with us</h3>
          <p>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.</p>
        </div>
      

      <div class="content-wrapper clearfix">
                        <div class="span9 contentb">
                            <div class="content-holder">
                                
                                <div class="span10 offset1">
                                    <?php if(Yii::app()->user->hasFlash('contact')): ?>

                                        <div class="flash-success">
                                            <?php echo Yii::app()->user->getFlash('contact'); ?>
                                        </div>

                                    <?php else: ?>

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

                                            <div class="row_contactus">
                                                <?php echo $form->labelEx($model,'name'); ?>
                                                <?php echo $form->textField($model,'name'); ?>
                                                <?php echo $form->error($model,'name'); ?>
                                            </div>

                                            <div class="row_contactus">
                                                <?php echo $form->labelEx($model,'email'); ?>
                                                <?php echo $form->textField($model,'email'); ?>
                                                <?php echo $form->error($model,'email'); ?>
                                            </div>

                                            <div class="row_contactus">
                                                <?php echo $form->labelEx($model,'subject'); ?>
                                                <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
                                                <?php echo $form->error($model,'subject'); ?>
                                            </div>

                                            <div class="row_contactus">
                                                <?php echo $form->labelEx($model,'body'); ?>
                                                <?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
                                                <?php echo $form->error($model,'body'); ?>
                                            </div>

                                            <?php if(CCaptcha::checkRequirements()): ?>
                                                <div class="row_contactus">
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

                                            <div class="row_contactus buttons" style="margin-top: 15px;">
       <!-- deleted 'btn-contactus' -->           <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary contactSubmit')); ?>&nbsp;
                                            </div>

                                            <?php $this->endWidget(); ?>

                                        </div><!-- form -->

                                  <?php endif; ?>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
      </div>
    </div>
    <!--======= MAP =========-->
    <div id="map_canvas"></div>
  </section>
  
  


