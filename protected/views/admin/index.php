<script type="text/javascript">
    function Filter_Property(){

        var pid = '';

        if ($('#propertyid').val() != '') {

            if (!isNaN($('#propertyid').val())) {

                pid = $('#propertyid').val();
                window.document.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=0&pid=' + pid);

            } else {
                alert("Property ID must be a Numeric Value..!");
            }

        }

    }
</script>
<div class="col_right">
    <div class="span-10">
        <p>Welcome back, what would you like to do?</p>
    </div>
    <div class="span1">
        <div class="control-group">
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    New
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=1">Home Sales</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=2"">Land Sales</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=3"">Home Rental</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=4"">Commercial Sales</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=5"">Commercial Leased</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="span1">
        <div class="control-group">
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    View
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=1">Home Sales</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=2">Land Sales</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=3">Home Rental</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=4">Commercial Sales</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=5">Commercial Leased</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="span9" style="text-align: right">
        <div class="control-group">
            <form class="form-search">
                <div class="input-append">
                    <?php echo CHtml::textField('propertyid', '', array('class' => 'span12 search-query', 'placeholder'=>'Enter Property ID')); ?>
                    <a href="javascript:Filter_Property();" class="btn" style="margin-left: 0px;"><i class="icon-search"></i>&nbsp;Find</a>
                </div>
            </form>
        </div>
    </div>
    <div class="span10 hidden-phone" style="text-align: center;">
        <div>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/editing-icon.png" style="width: 200px; height: 200px;">
        </div>
        <div>
            <h2>You are in "Admin Control" mode</h2>
            <h4>The easy way to manage your listings and much more!</h4>
        </div>
    </div>
</div>

