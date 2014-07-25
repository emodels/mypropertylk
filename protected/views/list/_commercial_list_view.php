<div class="row-fluid" style="padding-top: 15px;">
    <div class="span12 property-box">
        <div class="heading_commercial" id="box-heading">
            <div class="span8">
                <?php echo $data->number . ', ' . ucwords($data->streetaddress) . ', '. ucwords($data->areaname) . ', ' . ucwords($data->townname) ?>
            </div>
            <div class="span4" style="text-align: right; font-family: Monotype Corsiva; font-size: 20px; "><?php echo $data->pricetype0->proptype ?></div>
        </div>
        <div>
            <div class="span7" style="padding-top: 0;">
                <a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' .$data->pid;?> ">
                    <?php
                    $imgname = "";

                    if (count($data->propertyimages) > 0) {

                        foreach ($data->propertyimages as $value) {

                            if ($value->primaryimg == 1 && $value->imagetype == 0) {

                                $imgname = $value->imagename;
                            }
                        }

                        if ($imgname != "") {?>

                            <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $imgname ?>" class="listing-img">

                        <?php
                        } else{ ?>

                            <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $data->propertyimages[0]->imagename ?>" class="listing-img">

                        <?php
                        }
                    } else{ ?>

                        <img src="<?php echo Yii::app()->baseUrl;?> . /upload/propertyimages/prop_no_img.jpg" class="listing-img">
                    <?php } ?>
                </a>
            </div>
            <div class="span5 content">
                <div style="text-align: right; color: #6a0812; font-weight: bold">
                    <b>Rs.</b>
                    <?php if($data->type == 4){
                        echo Yii::app()->numberFormatter->format("#,##0", $data->price);
                    } elseif ($data->type == 5) {
                        echo Yii::app()->numberFormatter->format("#,##0", $data->monthlyrent) . " (monthly rental)";
                    }
                    ?>
                </div>
                <div class="listing-small" style="padding: 20px 0 0 0">
                    <?php
                    $proptype_array = array();
                    foreach ($data->propertytyperelations as $value){
                        $proptype_array[] = $value->type->proptype;
                    }
                    echo implode('&nbsp;&nbsp;|&nbsp;&nbsp;', $proptype_array);
                    ?>
                </div>
                <div>
                    <?php if($data->type != 2 ){?>
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/parking_spaces.png"/>&nbsp;<?php echo $data->parkingspaces;?>
                    <?php } ?>
                </div>
                <div class="listing-bold"><?php echo$data->headline; ?></div>
                <div class="listing-small-normal"><?php echo substr($data->desc, 0, 360).'....'; ?></div>
                <div class="listing-small"><b>Agent :</b> <?php echo ucwords($data->agent0->fname) .' '. ucwords($data->agent0->lname)  ?></div>
                <div style="text-align: right; padding-top: 15px;">
                    <a class="btn" href="#"><i class="icon-star-empty"></i> Save</a>
                    <a class="btn" href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' .$data->pid;?> ">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid" style="margin-top: 15px;">
    <?php

    if($index % 1 == 0 && $index != 0){

        echo loadMiddleAdvertisement($adv_All);

    }

    ?>
</div>




