<div class="span3"  style="float: left; margin-left: 18px">
    <article class="property-item">
    <div class="property-images">
        <a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' .$data->pid;?>" title="<?php echo $data->pid; ?>">
            <?php
            if (($data->type == 1 || $data->type == 2) && $data->status == 1) {?>
                <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. ((count($data->propertyimages) > 0) ? $data->propertyimages[0]->imagename : 'prop_no_img.jpg') ?>" class="status-35 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />
            <?php } elseif ($data->type == 3 && $data->status == 1) { ?>
                <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. ((count($data->propertyimages) > 0) ? $data->propertyimages[0]->imagename : 'prop_no_img.jpg') ?>" class="status-28 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />
            <?php } ?>

            <?php if ($data->status == 2) { ?>

                <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. ((count($data->propertyimages) > 0) ? $data->propertyimages[0]->imagename : 'prop_no_img.jpg') ?>" class="status-sold wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />
            <?php }?>

        </a>
        <div>
            <?php
            if (($data->type == 1 || $data->type == 2) && $data->status == 1) {
                echo "<div class='property-status status-35-text'> On Sale</div>";
            } elseif ($data->type == 3 && $data->status == 1) {
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
        <h3 class="attribute-title"><a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' .$data->pid;?>" title="<?php echo $data->pid; ?>" ><?php echo ucwords($data->number) . ', ' . ucwords($data->streetaddress) . ', '. ucwords($data->areaname) ; ?></a></h3>
        <span class="attribute-city"><?php echo $data->townname; ?></span>
        <div class="attribute-price">
            <span class="attr-pricing"><sup class="price-curr">Rs.</sup>
                <?php
                if ($data->type == 1 || $data->type == 2) {
                    echo Yii::app()->numberFormatter->format("#,##0.00", $data->price);
                } elseif ($data->type == 3) {
                    echo Yii::app()->numberFormatter->format("#,##0.00", $data->monthlyrent);
                }
                ?>
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


