<li class="col-sm-4">
    <!--======= TAGS =========-->
<!--<span class="tag font-montserrat sale">FOR SALE</span>-->
            
    <section>
        <!--======= IMAGE =========-->
        <div class="img"> 
            <?php
            $prevdate = date('Y-m-d', strtotime('-7 days'));

            if ($data->entrydate >= $prevdate) {
            ?>
            <!--<div class="newIcon"><img src="<?php echo Yii::app()->baseUrl . '/images/new_icon.png' ?>" style="max-height: 195px;"></div>-->
            <?php } ?>
            <a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' . $data->pid; ?>" title="<?php echo $data->pid; ?>">
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

                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $imgname ?>" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                        <?php } ?>
 
                        <?php if (($data->type == 3 || $data->type == 5) && $data->status == 1) { ?>

                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $imgname ?>"  alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                        <?php } ?>

                        <?php if ($data->status == 2) { ?>

                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $imgname ?>"  alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                        <?php }
                        
                    } else {

                        if (($data->type == 1 || $data->type == 2 || $data->type == 4) && $data->status == 1) { ?>

                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $data->propertyimages[0]->imagename ?>"  alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php } ?>

                    <?php if (($data->type == 3 || $data->type == 5) && $data->status == 1) { ?>

                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $data->propertyimages[0]->imagename ?>"  alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php } ?>

                    <?php if ($data->status == 2) { ?>

                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $data->propertyimages[0]->imagename ?>"  alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php } 
                    
                    }
                    
                } else {

                    if (($data->type == 1 || $data->type == 2 || $data->type == 4) && $data->status == 1) { ?>

                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/upload/propertyimages/prop_no_img.jpg"  alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php } ?>

                        <?php if (($data->type == 3 || $data->type == 5) && $data->status == 1) { ?>

                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/upload/propertyimages/prop_no_img.jpg"  alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                        <?php } ?>

                    <?php if ($data->status == 2) { ?>

                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/upload/propertyimages/prop_no_img.jpg"  alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                    <?php }
                }
                ?>

            </a>
            <div>
                <?php if (($data->type == 1 || $data->type == 2 || $data->type == 4) && $data->status == 1) {
                    
                  echo "<span class='tag font-montserrat sale'>FOR SALE</span>";
                    //echo "<div class='property-status status-35-text'> On Sale</div>";
                    
                } elseif (($data->type == 3 || $data->type == 5) && $data->status == 1) {
                    echo "<span class='tag font-montserrat rent'>FOR RENT</span>";
//                    echo "<div class='property-status status-28-text'> For Rent</div>";
                }
                
                if ($data->status == 2) {
                    echo "<span class='tag font-montserrat sale'>FOR SOLD</span>";
//                    echo "<div class='property-status status-sold-text'>Sold</div>";
                }
                ?>
            </div>
        </div><!-- /.property-images -->

        <!--  ======= IMAGE HOVER =========-->

        <div class="over-proper"> <a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' . $data->pid; ?>" title="<?php echo $data->pid; ?>" class="btn font-montserrat">more details</a> </div>
    
        <!--  ======= HOME INNER DETAILS =========-->
        <ul class="home-in">
            <li><span><i class="fa fa-bed"></i> <?php echo $data->bedrooms; ?> Bedrooms</span></li>
            <li><span><i class="fa fa-tty"></i> <?php echo $data->bathrooms; ?> Bathrooms</span></li>
            <li><span><i class="fa fa-car"></i> <?php echo $data->parkingspaces; ?> Parking</span></li>
        </ul>
        <!--  ======= HOME DETAILS =========-->
        <div class="detail-sec"> <span class="locate">
            <i class="fa fa-map-marker" class="font-montserrat text-center"></i> <a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' . $data->pid; ?>"><?php echo ucwords($data->townname); ?></a></span>
        <div class="share-p"> 
            <span class="price font-montserrat">
                <?php if ($data->dispalyprice < 2 && ($data->price > 0 || $data->monthlyrent > 0)) { ?>
                    Rs.
                  <?php
                    if ($data->type == 1 || $data->type == 2 || $data->type == 4) {
                        echo Yii::app()->numberFormatter->format("#,##0", $data->price);
                    } elseif ($data->type == 3 || $data->type == 5) {
                        echo Yii::app()->numberFormatter->format("#,##0", $data->monthlyrent);
                    }
                    ?>
                    <?php } else { ?>
                    Contact agent
                    <?php } 
                    ?>

            </span> <i class="fa fa-star-o"></i> <i class="fa fa-share-alt"></i> </div>
    </div>
    </section>
</li>





