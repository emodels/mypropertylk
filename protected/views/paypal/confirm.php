<?php
$this->breadcrumbs=array(
	'Paypa'=>array('/paypal'),
	'Confirm',
);
?>

<div class="col_right">
    <div class="span12" style="background-color: #003bb3; color: #ffffff; padding: 10px; text-align: center; font-size: 18px; margin-top: 10px; ">
        <p>Payment Received Successfully - Thank You for your Payment!</p>
    </div>
    <div class="span12" style="padding: 10px; margin-top: 20px; border: solid 1px silver; margin-left: 0; margin-bottom: 10px; ">
        <div class="span12" style="background-color: rgba(54, 246, 85, 0.49); padding: 20px; text-align: center; margin-left: 0; ">
            <h3> Your Transaction was Successfully Processed.</h3>
            <?php if ($transaction->type == 1) { ?>
                <p> Your Property will be Activated soon by Administrator... </p>
            <?php } else{?>
                <p> Your Advertisement has been published successfully...! </p>
            <?php } ?>
            <div style="text-align: center; width: 100%">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/pay_sucess.ico" style="width: 150px; height: 150px;">
            </div>
            <p style="padding-top: 10px;"> Information of this transaction has been send to your email account as well.  </p>
        </div>

    </div>
</div>