<div class="row-fluid">
    <div class="span listing-row">
        <div class="span1">
            <?php echo $data->id ?>
        </div>
        <div class="span1" style="text-align: center">
            <?php
            if ($data->type == 1) {?>
                <a href="<?php echo Yii::app()->baseUrl . '/list/detail/pid/' .$data->referenceid;?> " target="_blank"><?php echo "#". $data->referenceid ?></a>
            <?php } else {
                echo "#". $data->referenceid;
            }?>
        </div>
        <div class="span3" style="text-align: center">
            <?php
            if ($data->type == 1) {

                echo "Property Upgraded";
            }
            if ($data->type == 2) {

                echo "Advertisement";
            }
            ?>
        </div>
        <div class="span2">
            <?php echo $data->transactiondate ?>
        </div>
        <div class="span2">
            <?php echo $data->amount ?>
        </div>
        <div class="span2">
            <?php
            if ($data->status == 0) { ?>

                <p style="color: #ff0000">Pending </p>
            <?php }
            if ($data->status == 1) { ?>

                <p style="color: #2ecb46">Completed </p>
            <?php } ?>
        </div>
        <div class="span1">
            <a href="javascript:Delete_Transaction(<?php echo $data->id; ?>);" class="lnklnkno-style" title="delete"><i class="icon-remove icon_gap"></i></a>
        </div>
    </div>
</div>
