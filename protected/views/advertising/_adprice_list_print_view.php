<div style="width: 100%; page-break-after: always">
    <div class="span listing-row">
        <div>
            <div class="span3" style="font-size: 22px; font-weight: bold">
                <div><?php echo  $data->page0->page ; ?></div>
                <div class="listing-normal" style="margin-top: 20px"><?php echo  "Ad Size: " . $data->size0->size ; ?></div>
                <div class="listing-normal"><?php echo "Price: Rs. " . Yii::app()->numberFormatter->format("#,##0.00", $data->price) ; ?><span style="color: red; padding-left: 10px">(Per week)</span></div>
            </div>
            <div class="span5" style="max-width: 445px;">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsampleimages/<?php echo $data->adsample; ?>" style="border: solid 1px silver"/>
            </div>
            <div class="span4">
                <?php
                //echo $data->size0->width . "/" . $data->size0->height;

                if ($data->size0->width == 300 && $data->size0->height == 60) {?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/300x60.png" style="border: solid 1px #070640"/>
                <?php } else if ($data->size0->width == 300 && $data->size0->height == 250) {?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/300x250.png" style="border: solid 1px #070640"/>
                <?php } else if ($data->size0->width == 300 && $data->size0->height == 600) {?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/300x600.png" style="border: solid 1px #070640"/>
                <?php } else if ($data->size0->width == 600 && $data->size0->height == 100) {?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/600x100.png" style="border: solid 1px #070640"/>
                <?php } else if ($data->size0->width == 900 && $data->size0->height == 100) {?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/900x100.png" style="border: solid 1px #070640"/>
                <?php }?>
            </div>
        </div>
    </div>
</div>
