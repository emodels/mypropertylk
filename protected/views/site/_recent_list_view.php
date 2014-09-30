<div class="span3" style="margin-left: 0px !important; margin-right: 1.92%; !important">
    <article class="property-item">
    <div class="property-images" style=" position: relative; top:0; left: 0;">
        <?php

        $prevdate = date('Y-m-d', strtotime('-7 days'));

        if ($data->entrydate >= $prevdate) {?>
            <div class="newIcon"><img src="<?php echo Yii::app()->baseUrl . '/images/new_icon.png'?>" style="max-height: 195px;"></div>
        <?php }?>
        <a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' .$data->pid;?>" title="<?php echo $data->pid; ?>">
           <!--------Property Image-------------->
            <?php
            $imgname = "";

            if (count($data->propertyimages) > 0) {

                foreach ($data->propertyimages as $value) {

                    if ($value->primaryimg == 1 && $value->imagetype == 0) {

                        $imgname = $value->imagename;
                    }
                }

                if ($imgname != "") {

                    if (($data->type == 1 || $data->type == 2 || $data->type == 4) && $data->status == 1) { ?>

                    <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $imgname ?>" class="status-35 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php }

                    if (($data->type == 3  || $data->type == 5) && $data->status == 1) { ?>

                    <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $imgname ?>" class="status-28 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php }

                    if ($data->status == 2) { ?>

                    <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $imgname ?>" class="status-sold wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php }


                } else {

                    if (($data->type == 1 || $data->type == 2 || $data->type == 4) && $data->status == 1) { ?>

                        <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $data->propertyimages[0]->imagename ?>" class="status-35 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php }

                    if (($data->type == 3  || $data->type == 5) && $data->status == 1) { ?>

                        <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $data->propertyimages[0]->imagename ?>" class="status-28 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php }

                    if ($data->status == 2) { ?>

                        <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $data->propertyimages[0]->imagename ?>" class="status-sold wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php }



                }
            } else {

                if (($data->type == 1 || $data->type == 2 || $data->type == 4) && $data->status == 1) { ?>

                <img width="540" height="360" src="<?php echo Yii::app()->baseUrl;?>/upload/propertyimages/prop_no_img.jpg" class="status-35 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                <?php }

                if (($data->type == 3  || $data->type == 5) && $data->status == 1) { ?>

                    <img width="540" height="360" src="<?php echo Yii::app()->baseUrl;?>/upload/propertyimages/prop_no_img.jpg" class="status-28 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                <?php }

                if ($data->status == 2) { ?>

                    <img width="540" height="360" src="<?php echo Yii::app()->baseUrl;?>/upload/propertyimages/prop_no_img.jpg" class="status-sold wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                <?php }
            } ?>

        </a>
        <div>
            <?php
            if (($data->type == 1 || $data->type == 2 || $data->type == 4) && $data->status == 1) {
                echo "<div class='property-status status-35-text'> On Sale</div>";
            } elseif (($data->type == 3 || $data->type == 5) && $data->status == 1) {
                echo "<div class='property-status status-28-text'> For Rent</div>";
            } ?>
            <?php
            if($data->status == 2){
                echo "<div class='property-status status-sold-text'> Sold </div>";
            }
            ?>
        </div>
    </div><!-- /.property-images -->
    <div class="property-attribute">
        <h3 class="attribute-title text-center"><a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' .$data->pid;?>"><?php echo ucwords($data->townname); ?></a></h3>
        <div class="attribute-price">
            <span class="attr-pricing">
                <?php if ($data->dispalyprice < 2 && ($data->price > 0 || $data->monthlyrent > 0)) { ?>
                <sup class="price-curr">Rs.</sup>
                <?php
                if ($data->type == 1 || $data->type == 2 || $data->type == 4) {
                    echo Yii::app()->numberFormatter->format("#,##0", $data->price);
                } elseif ($data->type == 3 || $data->type == 5) {
                    echo Yii::app()->numberFormatter->format("#,##0", $data->monthlyrent);
                }
                ?>
                <?php } else {  ?>
                    Contact agent
                <?php } ?>
            </span>
        </div>
    </div>
    <div class="property-meta clearfix">
        <div class="span4 img-icon" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/beds.png"/>&nbsp;<?php echo $data->bedrooms;?></div>
        <div class="span4 img-icon"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/baths.png"/>&nbsp;<?php echo $data->bathrooms;?></div>
        <div class="span4 img-icon"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/parking_spaces.png"/>&nbsp;<?php echo $data->parkingspaces;?></div>
    </div>
</article>
</div>


