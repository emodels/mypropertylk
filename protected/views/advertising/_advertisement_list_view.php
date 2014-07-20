<div class="row-fluid">
    <div class="span listing-row">
        <div class="span5">
            <a href="<?php echo "http://" . $data->adlink;  ?>" title="" target="_blank" style="text-decoration: none">
                <img src="<?php echo Yii::app()->baseUrl . '/upload/adimages/'.$data->adimage; ?>">
            </a>
        </div>
        <div class="span4">
            <div class="listing-normal"><b>Page :</b> <?php echo $data->page0->page; ?></div>
            <div class="listing-normal"><b>Size :</b> <?php echo $data->size0->size; ?></div>
        </div>
        <div class="span3">
            <div class="hidden-phone"></br></div>
            <div>
                <?php if (Yii::app()->user->usertype == 0) {?>
                <a href="javascript:AdStatusChange(<?php echo $data->id; ?>);" class="icon_gap lnkno-style">
                    <?php
                    if ($data->status == 0) {
                        echo "InActive";
                    } elseif ($data->status == 1) {
                        echo "Active";
                    }
                    ?>
                </a>
                <?php } ?>
                <a href="<?php echo Yii::app()->request->baseUrl .'/advertising/editadvertisement/id/'. $data->id ;?>" class="lnklnkno-style" title="edit  "><i class="icon-edit icon_gap"></i></a>
                <a href="javascript:Delete_Ad(<?php echo $data->id; ?>);" class="lnklnkno-style" title="delete"><i class="icon-remove icon_gap"></i></a>
            </div>
        </div>
    </div>
</div>
