<?php
$backgroundColor = '';
$propertyBoxClass = '';
$bold = '';
//------------Buy Page-----//
if ($_GET['type'] == 'buy'){

    switch ($data->pricetype){

        case 1: /*---Standard property---*/

            $backgroundColor = '#fff';
            $propertyBoxClass = ' property-box-bottom-only';
            $bold = 'bold';

            break;

        case 2: /*---Premier property---*/

            $backgroundColor = '#A459C9';
            $propertyBoxClass = ' property-box';

            break;

        case 3: /*---Featured property---*/

            $backgroundColor = '#660099';
            $propertyBoxClass = ' property-box';

            break;
    }
}
//-------------Rent Page-----------//
if ($_GET['type'] == 'rent'){

    switch ($data->pricetype){

        case 1: /*---Standard property---*/

            $backgroundColor = '#fff';
            $propertyBoxClass = ' property-box-bottom-only';

            break;

        case 2: /*---Premier property---*/

            $backgroundColor = '#3ABD3A';
            $propertyBoxClass = ' property-box';

            break;

        case 3: /*---Featured property---*/

            $backgroundColor = '#009900';
            $propertyBoxClass = ' property-box';

            break;
    }
}
//---------------Sold Page------------//
if ($_GET['type'] == 'sold'){

    switch ($data->pricetype){

        case 1: /*---Standard property---*/

            $backgroundColor = '#fff';
            $propertyBoxClass = ' property-box-bottom-only';

            break;

        case 2: /*---Premier property---*/

            $backgroundColor = 'D13D3D';
            $propertyBoxClass = ' property-box';

            break;

        case 3: /*---Featured property---*/

            $backgroundColor = '#CC0000';
            $propertyBoxClass = ' property-box';

            break;
    }
}

?>
<div class="container-fluid" style="padding: 0;">
    <div class="row-fluid" style="padding-top: 0px;">
        <div class="span12 <?php echo $propertyBoxClass; ?>">
            <div class="row-fluid">
                <div class="span12 heading_buy" id="box-heading" style="height: auto; background-color: <?php echo $backgroundColor; ?>; font-weight: <?php echo $bold; ?>">
                    <div class="row-fluid" style="padding-top: 5px;">
                        <div class="span8">
                            <?php
                            if ($data->hidestreetaddress != 1) {
                                $address = "";

                                if (strlen($data->number) > 3) {

                                    $address .= $data->number . ", ";
                                }

                                if (strlen($data->streetaddress) > 3) {

                                    $address .= ucwords($data->streetaddress) . ", ";
                                }

                                if (strlen($data->areaname) > 3){

                                    $address .= ucwords($data->areaname) . ", ";
                                }

                                if (strlen($data->townname) > 3) {

                                    $address .= ucwords($data->townname);
                                }

                                echo $address;
                            } else{

                                echo "Contact Agent for Address...";
                            }
                            ?>
                        </div>
                        <div class="span4" style="text-align: right; font-family: Monotype Corsiva; font-size: 20px; ">
                            <?php echo $data->pricetype0->proptype ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid span12" style="margin-left: 0">
                <div class="span6" style="padding-top: 0; border-right: solid 1px silver; width: auto; max-height: 210px; position: relative; top:0; left: 0;">
                    <?php

                    $prevdate = date('Y-m-d', strtotime('-7 days'));

                    if ($data->entrydate >= $prevdate) {?>
                        <div class="newIcon"><img src="<?php echo Yii::app()->baseUrl . '/images/new_icon.png'?>"></div>
                    <?php }

                    if ($data->status == 2 ) {?>
                        <div class="newIcon"><img src="<?php echo Yii::app()->baseUrl . '/images/sold.png'?>"></div>
                    <?php }
                    ?>
                    <a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' .$data->pid;?>" title="<?php echo $data->pid; ?>">
                        <div class="wowslider-container-listview">
                            <div>
                                <div class="ws_images">
                                    <ul>
                                        <?php
                                        $imgname = "";

                                        if (count($data->propertyimages) > 0) {

                                            foreach ($data->propertyimages as $value) {

                                                if ($value->imagetype == 0) {

                                                    $imgname = $value->imagename;
                                                    if ($imgname != "") {?>
                                                        <li>
                                                            <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $imgname ?>" style="max-height: 195px;">
                                                        </li>

                                                    <?php
                                                    } else{ ?>
                                                        <li>
                                                            <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $data->propertyimages[0]->imagename ?>" style="max-height: 195px;">
                                                        </li>
                                                    <?php
                                                    }
                                                }
                                            }

                                        } else{ ?>
                                            <li>
                                                <img src="<?php echo Yii::app()->baseUrl;?>/upload/propertyimages/prop_no_img.jpg" style="max-height: 195px;">
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="ws_shadow"></div>
                        </div>
                    </a>
                </div>
                <div class="span6">
                    <div class="content">
                        <div style="text-align: right; color: #6a0812; font-weight: bold">
                            <?php
                            if ($data->dispalyprice == 1) {

                                if ($data->price != 0 || $data->monthlyrent != 0) {
                                    if($data->type == 1 || $data->type == 2){
                                        echo "Rs. " . Yii::app()->numberFormatter->format("#,##0", $data->price);
                                    } elseif ($data->type == 3) {
                                        echo "Rs. " . Yii::app()->numberFormatter->format("#,##0", $data->monthlyrent) . " (monthly rental)";
                                    }
                                } else{
                                    echo "Contact Agent";
                                }
                            } elseif ($data->dispalyprice == 2) {

                                echo "N/A";

                            } elseif ($data->dispalyprice == 3 || $data->dispalyprice == 0) {

                                echo "Contact Agent";
                            }
                            ?>
                        </div>
                        <div class="listing-small">
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
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/beds.png"/>&nbsp;<?php echo $data->bedrooms;?>&nbsp;
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/baths.png"/>&nbsp;<?php echo $data->bathrooms;?>&nbsp;
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/parking_spaces.png"/>&nbsp;<?php echo $data->parkingspaces;?>
                            <?php } ?>
                        </div>
                        <div class="listing-bold" style="margin-top: 10px; margin-bottom: 5px"><?php echo substr($data->headline, 0, 40) . '...'; ?></div>
                        <!--<div class="listing-small-normal"><?php /*echo substr($data->desc, 0, 50).'....'; */?></div>-->
                        <div class="listing-small">
                            <!--( Vendor information )-->
                            <?php
                            if ($data->sendemail == 1) {

                                echo "<b>Vendor:</b> " . ucwords($data->vendorname);

                            } else { //--( Agent information )-//

                                echo "<b>Agent:</b> " . ucwords($data->agent0->fname) .' ' . ucwords($data->agent0->lname);

                            }
                            ?>
                        </div>
                        <div style="text-align: right; padding-top: 10px;">
                            <?php
                            $isWatched = false;
                            if (!Yii::app()->user->isGuest && Watchlist::model()->exists('userid = ' . Yii::app()->user->id . ' AND propertyid = ' . $data->pid)) {

                                $isWatched = true;
                            }

                            if ($_GET['type'] != "sold") {
                            ?>
                            <a class="btn <?php echo ($isWatched) ? 'btn-warning' : '' ?>" href="javascript:SaveProperty(<?php echo $data->pid; ?>);"><i class="icon-star-empty"></i> Save</a>
                            <?php } ?>
                            <a class="btn" href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' .$data->pid;?> ">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid" style="margin: 0 0 15px 0;">
    <?php

        if($index % 3 == 0 && $index != 0){

            echo loadMiddleAdvertisement($adv_All);

        }

    ?>
</div>
