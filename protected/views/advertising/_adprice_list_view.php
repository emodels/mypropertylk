<div class="row-fluid">
    <div class="span listing-row">
        <div class="span3">
        <div class="listing-normal"><?php echo  $data->page0->page ; ?></div>
        </div>
        <div class="span4">
            <div class="listing-normal"><?php echo  $data->size0->size ; ?></div>
        </div>
        <div class="span2" style="text-align: right">
            <div class="listing-normal"> Rs. <?php echo Yii::app()->numberFormatter->format("#,##0.00", $data->price) ; ?></div>
        </div>
        <?php if (Yii::app()->user->usertype == 0) {?>
        <div class="offset1 span2">
            <div>
                <a href="<?php echo Yii::app()->request->baseUrl .'/advertising/editprices/id/'. $data->id ;?>" class="lnklnkno-style" title="edit  "><i class="icon-edit icon_gap"></i></a>
                <a href="javascript:Delete_Prices(<?php echo $data->id; ?>);" class="lnklnkno-style" title="delete"><i class="icon-remove icon_gap"></i></a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
