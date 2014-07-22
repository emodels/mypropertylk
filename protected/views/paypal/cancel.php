<?php
$this->breadcrumbs=array(
	'Paypal'=>array('/paypal'),
	'Cancel',
);
?>

<div class="col_right">
    <div class="span12" style="background-color: #003bb3; color: #ffffff; padding: 10px; text-align: center; font-size: 18px; margin-top: 10px; ">
        <p>Sorry... ! Your Payment was Canceled...</p>
    </div>
    <div class="span12" style="padding: 10px; margin-top: 20px; border: solid 1px silver; margin-left: 0; margin-bottom: 10px; ">
        <div class="span12" style="background-color: rgba(255, 74, 38, 0.49); padding: 20px; text-align: center; margin-left: 0; ">
            <h3> Your Transaction was Cancelled.</h3>
            <p> If you have any questions please contact us. </p>
            <div style="text-align: center; width: 100%">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/payment_cancel.png" style="width: 150px; height: 150px;">
            </div>
        </div>

    </div>
</div>