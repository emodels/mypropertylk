<style type="text/css">
    .listing-row{
        height: 80px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_list').addClass('active');

    });


    function Premier_Property(id) {

        $.ajax({
            type: "GET",
            url: 'promotelisting/mode/PREMIERE/pid/' + id,
            success: function(data){
                if (data == 'done'){
                    window.document.location.replace('<?php echo Yii::app()->request->baseUrl?>/property/propertylisting/type/0');
                }
                if (data == 'paypal') {
                    window.document.location.replace('<?php echo Yii::app()->request->baseUrl?>/paypal/buy');
                }
            }
        });
    }

    function Featured_Property(id) {

        $.ajax({
            type: "GET",
            url: 'promotelisting/mode/FEATURED/pid/' + id,
            success: function(data){
                if (data == 'done'){
                    window.document.location.replace('<?php echo Yii::app()->request->baseUrl?>/property/propertylisting/type/0');
                }
                if (data == 'exceed'){
                    window.document.location.replace('<?php echo Yii::app()->request->baseUrl?>/property/promotelisting/pid/' + id);
                }
                if (data == 'paypal') {
                    window.document.location.replace('<?php echo Yii::app()->request->baseUrl?>/paypal/buy');
                }
            }
        });
    }

    function Standard_Property(id) {

        $.ajax({
            type: "GET",
            url: 'promotelisting/mode/STANDARD/pid/' + id,
            success: function(data){
                if (data == 'done'){
                    window.document.location.replace('<?php echo Yii::app()->request->baseUrl?>/property/propertylisting/type/0');
                }
            }
        });
    }

</script>

<div class="col_right" style="padding-top: 0;">
    <div class="span12">
        <div class="span12">
            <legend>
                <h3>Make Your Property Advertisement Stand Out!</h3>
            </legend>
        </div>
    </div>
    <div class="span12" style="margin-left: 0 ">
        <div class="container row-fluid span12">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id'=>'promotelisting-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'afterValidate' => 'js:formSend',
                ),
                'htmlOptions'=>array('class'=>'form-horizontal'),
            )); ?>
            <form id="form-price-list" class="form">
                <div style="padding:10px 20px 20px 20px; border: solid 1px silver; border-radius: 5px; margin-bottom: 10px; background-color: paleturquoise ">
                    <h4 style="color: blue; border-bottom: solid 1px silver;">
                        Featured Property
                    </h4>

                    <p>Featured Properties comes Home page Featured property list. These are the <b>Advantages</b> you meet,</p>
                    <div style="font-size: 12px;">
                        <p><i class="icon-tag icon_gap"></i>Your advertisement will be display at <b>Home Page</b> for a period of <b> one month.</b></p>
                        <p><i class="icon-tag icon_gap"></i>Featured Properties are more visible to buyers and that will drive more opportunities to sell your property much <b>faster</b>...</p>
                        <p><i class="icon-tag icon_gap"></i>You have to pay LKR. <b><?php echo $priceFeatured->price ;?> </b>/= only.</p>
                    </div>
                    <p>If you would like to upgrade your property as a <b>Featured Property</b> click "Upgrade as Featured Property" button below.</p>
                    <div style="text-align: right; border-top: solid 1px silver; padding-top: 10px;">
                        <a href="#featuredProp" role="button" class="btn" data-toggle="modal"><i class="icon-th-large icon_gap"></i>Click here to View Sample</a>
                        <div class="btn-group">
                            <button class="btn btn-primary"><a href="javascript:Featured_Property(<?php echo $model->pid; ?>);" style="text-decoration: none; color: #ffffff">Upgrade as Featured Property</a></button>
                        </div>
                    </div>
                </div>
                <div style="padding:10px 20px 20px 20px; border: solid 1px silver; border-radius: 5px; margin-bottom: 10px; background-color: mistyrose">
                    <h4 style="color: red; border-bottom: solid 1px silver;">
                        Premiere Property
                    </h4>
                    <p>Premiere Properties comes top of the Property Listing pages. These are the <b>Advantages</b> you meet,</p>

                    <div style="font-size: 12px;">
                        <p><i class="icon-tag icon_gap"></i>Your advertisement will be listed top of the "Search Result" just after the Featured Properties.</p>
                        <p><i class="icon-tag icon_gap"></i>That will drive more opportunities to sell your property much <b>faster</b>.</b></p>
                        <p><i class="icon-tag icon_gap"></i>Your advertisement will not expire at all.</p>
                        <p><i class="icon-tag icon_gap"></i>You have to pay LKR. <b><?php echo $pricePremier->price ;?> </b>/= only.</p>
                    </div>

                    <p>If you would like to upgrade your property as a <b>Premiere Property</b> click "Upgrade as Premiere Property" button.</p>
                    <div style="text-align: right; border-top: solid 1px silver; padding-top: 10px;">
                        <a href="#premireProp" role="button" class="btn" data-toggle="modal"><i class="icon-th-large icon_gap"></i>Click here to View Sample</a>
                        <div class="btn-group">
                            <button class="btn btn-danger">
                                <a href="javascript:Premier_Property(<?php echo $model->pid; ?>);" style="text-decoration: none; color: #ffffff">Upgrade as Premiere Property</a>
                            </button>
                        </div>
                    </div>
                </div>
                <div style="padding:10px 20px 20px 20px; border: solid 1px silver; border-radius: 5px; margin-bottom: 10px; background-color: #fcf9b2">
                    <h4 style="color: #ffa806;  border-bottom: solid 1px silver;">
                        Standard Property
                    </h4>

                    <p>If you not upgrade your Property as Premiere Property or Featured Property it will keep as a Standard Property.</p>

                    <div style="font-size: 12px;">
                        <p><i class="icon-tag icon_gap"></i>Standard Properties are listed below the Premiere Properties.</b></p>
                        <p><i class="icon-tag icon_gap"></i>Your advertisement will not expire at all.</p>
                        <p><i class="icon-tag icon_gap"></i>We will published your advertisement <b> Free of Charge</b>.</p>
                    </div>

                    <div style="text-align: right;  border-top: solid 1px silver; padding-top: 10px;">
                        <a href="#standardProp" role="button" class="btn" data-toggle="modal"><i class="icon-th-large icon_gap"></i>Click here to View Sample</a>
                        <div class="btn-group">
                            <button class="btn btn-warning"><a href="javascript:Standard_Property(<?php echo $model->pid; ?>);" style="text-decoration: none; color: #ffffff">Keep as a Standard Property</a></button>
                        </div>
                    </div>
                </div>
            </form>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

<!-- Modal -->

<!--Premiere Property-->
<div id="premireProp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Premiere Property Position</h3>
    </div>
    <div class="modal-body">
        <img src="<?php echo Yii::app()->request->baseUrl?>/images/premire_prop.jpg">
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<!--Featured Property-->
<div id="featuredProp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Featured  Property Position</h3>
    </div>
    <div class="modal-body">
        <img src="<?php echo Yii::app()->request->baseUrl?>/images/featured_prop1.jpg">
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<!--Standard Property-->
<div id="standardProp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Standard Property Position</h3>
    </div>
    <div class="modal-body">
        <img src="<?php echo Yii::app()->request->baseUrl?>/images/standard_prop.jpg">
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>