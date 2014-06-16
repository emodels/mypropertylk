<div style="margin-left: 0; padding-bottom: 10px;" class="container row-fluid span listing-row">
    <div class="span2">
        <img src="<?php echo Yii::app()->baseUrl . '/upload/userimages/'. $data->userimage ?>" class="listing-userimg">
    </div>
    <div class="span5">
        <div class="listing-Address"><?php echo ucwords($data->fname) . ' '. ucwords($data->lname); ?></div>
        <div class="listing-normal">ID: <?php echo $data->id; ?></div>
        <div class="listing-small"><?php echo $data->email; ?></div>
        <div class="listing-small"><?php echo $data->phone; ?></div>
    </div>
    <div class="offset2 span3">
        <div class="listing-normal">
            <?php if ($data->usertype == 1 ) {
                echo "Member";
            } elseif ($data->usertype == 2 ) {
                echo "Agent";
            } elseif ($data->usertype == 3 ) {
                echo "Advertiser";
            }
            ?>
        </div>
        <div class="hidden-phone"></br></br></div>
        <div class="listing-btn">
            <a href="javascript:UserStatusChange(<?php echo $data->id; ?>);" class="icon_gap" style="text-decoration: none">
                <?php
                if ($data->status == 0) {
                    echo "InActive";
                } elseif ($data->status == 1) {
                    echo "Active";
                }
                ?>
            </a>
            <a href="<?php echo Yii::app()->request->baseUrl .'/profile/editprofile?id='. $data->id ;?>" class="lnkno-style" title="edit" style="text-decoration: none;"><i class="icon-edit icon_gap"></i></a>
            <a href="javascript:Delete_User(<?php echo $data->id; ?>);" class="lnkno-style" title="delete" style="text-decoration: none;"><i class="icon-trash icon_gap"></i></a>
        </div>
    </div>
</div>

