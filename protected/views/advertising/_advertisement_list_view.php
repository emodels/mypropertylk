<div class="row-fluid">
    <div class="span listing-row">
        <div class="span5">
            <a href="<?php echo "http://" . $data->adlink;  ?>" title="" target="_blank" style="text-decoration: none">
                <img src="<?php echo Yii::app()->baseUrl . '/upload/adimages/'.$data->adimage; ?>" style="border: solid 1px silver">
            </a>
        </div>
        <div class="span4">
            <div class="listing-normal"><b>Page :</b> <?php echo $data->page0->page; ?></div>
            <div class="listing-normal"><b>Size :</b> <?php echo $data->size0->size; ?></div>
        </div>
        <div class="span3">
            <div class="listing-normal"><b>Advertiser :</b> <?php echo $data->advertiser0->fname . ' ' . $data->advertiser0->lname; ?></div>
            <div>
                <?php if (Yii::app()->user->usertype == 0) {?>
                <a href="javascript:AdStatusChange(<?php echo $data->id; ?>);" class="icon_gap lnkno-style">
                    <?php
                    if ($data->status == 0) {
                        echo "<i class='icon-exclamation-sign icon_gap'></i>InActive";
                    } elseif ($data->status == 1) {
                        echo "<font style='color:green'><i class='icon-ok-sign icon_gap'></i>Active</font>";
                    } elseif ($data->status == 2) {
                        echo "<font style='color:red'><i class='icon-warning-sign icon_gap'></i>Expired</font>";
                    } elseif ($data->status == 3) {
                        echo "<font style='color:#e39c2f'><i class='icon-zoom-in icon_gap'></i>Pending Approval</font>";
                    }
                    ?>
                </a>
                <?php } else {
                    if ($data->status == 0) {
                        echo "<font style='color:blue'><i class='icon-exclamation-sign icon_gap'></i>InActive</font>&nbsp;&nbsp;";
                    } elseif ($data->status == 1) {
                        echo "<font style='color:green'><i class='icon-ok-sign icon_gap'></i>Active</font>&nbsp;&nbsp;";
                    } elseif ($data->status == 2) {
                        echo "<font style='color:red'><i class='icon-warning-sign icon_gap'></i>Expired</font>&nbsp;&nbsp;";
                    } elseif ($data->status == 3) {
                        echo "<font style='color:#e39c2f'><i class='icon-zoom-in icon_gap'></i>Pending Approval</font>&nbsp;&nbsp;";
                    }
                }?>
                <a href="<?php echo Yii::app()->request->baseUrl .'/advertising/editadvertisement/id/'. $data->id ;?>" class="lnklnkno-style" title="edit  "><i class="icon-edit icon_gap"></i></a>
                <a href="javascript:Delete_Ad(<?php echo $data->id; ?>);" class="lnklnkno-style" title="delete"><i class="icon-remove icon_gap"></i></a>
            </div>
        </div>
    </div>
</div>
