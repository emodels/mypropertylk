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
                } else {
                    window.document.location.replace('http://www.paypal.com/lk');
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
                } else {
                    window.document.location.replace('http://www.paypal.com/lk');
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
                } else {
                    window.document.location.replace('http://www.paypal.com/lk');
                }
            }
        });
    }

</script>

<div class="col_right" style="padding-top: 0;">
    <div class="span12">
        <div class="span12">
            <legend>
                <h3>Promote Listings</h3>
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
                <div style="padding:10px 20px 20px 20px; border: solid 1px silver; border-radius: 5px; margin-bottom: 10px; background-color: mistyrose">
                    <h4 style="color: red">
                        Premiere Property
                    </h4>
                    <p>Premiere Properties comes top of the Property Listing pages. If you would like to upgrade your property as a Premiere Property click this button.</p>
                    <div style="text-align: right;">
                        <div class="btn-group">
                            <button class="btn btn-danger">
                                <a href="javascript:Premier_Property(<?php echo $model->pid; ?>);" style="text-decoration: none; color: #ffffff">Upgrade as Premiere Property</a>
                            </button>
                        </div>
                    </div>
                </div>
                <div style="padding:10px 20px 20px 20px; border: solid 1px silver; border-radius: 5px; margin-bottom: 10px; background-color: paleturquoise ">
                    <h4 style="color: blue">
                        Featured Property
                    </h4>
                    <p>Featured Properties comes Home page Featured property list. If you would like to upgrade your property as a Featured Property click this button.</p>
                    <div style="text-align: right;">
                        <div class="btn-group">
                            <button class="btn btn-primary"><a href="javascript:Featured_Property(<?php echo $model->pid; ?>);" style="text-decoration: none; color: #ffffff">Upgrade as Featured Property</a></button>
                        </div>
                    </div>
                </div>
                <div style="padding:10px 20px 20px 20px; border: solid 1px silver; border-radius: 5px; margin-bottom: 10px; background-color: #fcf9b2">
                    <h4 style="color: #ffa806">
                        Standard Property
                    </h4>
                    <p>If you not upgrade your Property as Premiere Property or Featured Property it will keep as a Standard Property.</p>
                    <div style="text-align: right;">
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