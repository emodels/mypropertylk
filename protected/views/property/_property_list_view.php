<div data-id="<?php echo $data->pid; ?>" style="margin-left: 0px; padding-bottom: 10px;" class="container row-fluid span listing-row">
        <div class="span2">
            <a href="javascript:ViewProperty(<?php echo $data->pid ?>);" title="view property" style="text-decoration: none">
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
    <div class="span5">
        <a href="javascript:ViewProperty(<?php echo $data->pid ?>);" title="view" style="text-decoration: none">
            <div class="listing-Address">
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
        </a>
        <div class="listing-normal"><?php echo $data->district0->name ?> District</div>
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
        <div class="listing-small">
            <?php
            $proptype_array = array();
            foreach ($data->propertytyperelations as $value){
                $proptype_array[] = $value->type->proptype;
            }
            echo implode('&nbsp;&nbsp;|&nbsp;&nbsp;', $proptype_array);
            ?>
        </div>
    </div>
    <div class="span2" style="padding-top: 10px;">
        <div class="listing-small">
            <a href="javascript:ViewProperty(<?php echo $data->pid ?>);" title="view property" style="text-decoration: none">
                Property No : <?php echo $data->pid ?>
            </a>
        </div>
        <div class="listing-small"><b>
            <?php if($data->type == 1){
                echo "Home Sales";
            } elseif ($data->type == 2) {
                echo "Land Sales";
            } elseif ($data->type == 3) {
                echo "Home Rentals";
            } elseif ($data->type == 4) {
                echo "Commercial Sales";
            } elseif ($data->type == 5) {
                echo "Commercial Leased";
            }
            ?></b>
        </div>
        <div class="listing-small">
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
        <div class="listing-normal"><?php echo $data->pricetype0->proptype ?></div>
    </div>
    <div class="span3" style="text-align: right">
        <div style="padding-top: 10px;">
            <a href="<?php echo ((Yii::app()->user->usertype == 0) ? 'javascript:PropertyStatusChange(' . $data->pid . ');' : '#') ?>" class="icon_gap" style="text-decoration: none; cursor: <?php echo ((Yii::app()->user->usertype == 0) ? 'pointer' : 'default') ?>">
                <?php
                if ($data->status == 0) {
                    echo "<font style='color:red'><i class='icon-warning-sign icon_gap'></i>InActive</font>";
                } elseif ($data->status == 1) {
                    echo "<font style='color:green'><i class='icon-ok-sign icon_gap'></i>Active</font>";
                } else {
                    echo "<font style='color:#e39c2f'><i class='icon-zoom-in icon_gap'></i>Sold</font>";
                }
                ?>
            </a>
            <a href="javascript:ViewProperty(<?php echo $data->pid ?>);" title="view" style="text-decoration: none"><i class="icon-eye-open icon_gap"></i></a>
            <a href="<?php echo Yii::app()->request->baseUrl .'/property/editproperty?pid='. $data->pid ;?>" title="edit" style="text-decoration: none"> <i class="icon-edit icon_gap"></i></a>
            <a href="javascript:Delete_Property(<?php echo $data->pid; ?>);" title="delete" style="text-decoration: none"><i class="icon-trash icon_gap"></i></a>
        </div>
        <div class="listing-btn" style="margin: 10px 0;">
            <?php if ($data->status == 0 || $data->status == 1) { ?>
                   <a class="btn btn-danger" href="javascript:PropertySold(<?php echo $data->pid; ?>);" style="width: 125px;"><i class="icon-bookmark icon_gap"></i>Mark as Sold</a>
            <?php  } if ($data->status == 2) { ?>
                   <a class="btn btn-success" href="javascript:PropertySold(<?php echo $data->pid; ?>);" style="width: 125px;"><i class="icon-ok icon-white icon_gap"></i>Mark as Unsold</a>
            <?php } ?>
            </div>
        <div class="listing-btn">
            <a class="btn btn-warning"  href="<?php echo Yii::app()->request->baseUrl .'/property/promotelisting?pid='. $data->pid ;?>" style="width: 125px;"><i class="icon-star icon_gap"></i>Promote Listing</a>
        </div>
        <div style="padding-top: 5px; font-size: 13px;">
            <a href="javascript:ShowVendorDetail(<?php echo $data->pid; ?>);" class="icon_gap" style="text-decoration: none">
                <?php
                if ($data->sendemail == 0) {
                    echo "Show Vendor Details";
                } elseif ($data->sendemail == 1) {
                    echo "Show Agent Details";
                }
                ?>
            </a>
        </div>
    </div>
</div>
