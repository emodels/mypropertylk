<div data-id="<?php echo $data->pid; ?>" style="margin-left: 0px; padding-bottom: 10px;" class="container row-fluid span listing-row">
        <div class="span2">
            <a href="javascript:ViewProperty(<?php echo $data->pid ?>);" title="view property" style="text-decoration: none">
                <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. ((count($data->propertyimages) > 0) ? $data->propertyimages[0]->imagename : 'prop_no_img.jpg') ?>" class="listing-img">
            </a>
    </div>
    <div class="span5">
        <a href="javascript:ViewProperty(<?php echo $data->pid ?>);" title="view" style="text-decoration: none">
            <div class="listing-Address">
                    <?php
                    $address = "";

                    if ($data->number != "") {

                        $address .= $data->number . ", ";
                    }

                    if ($data->streetaddress != "") {

                        $address .= ucwords($data->streetaddress) . ", ";
                    }

                    if ($data->areaname != ""){

                        $address .= ucwords($data->areaname) . ", ";
                    }

                    if ($data->townname != "") {

                        $address .= ucwords($data->townname);
                    }

                    echo $address;
                    ?>
            </div>
        </a>
        <div class="listing-normal"><?php echo $data->district0->name ?> District</div>
        <div class="listing-small"><b>Agent:</b> <?php echo ucwords($data->agent0->fname) .' '. ucwords($data->agent0->lname)  ?></div>
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
        <div class="listing-small"><b>Rs.</b>
            <?php if($data->type == 1 || $data->type == 2 || $data->type == 4){
                echo Yii::app()->numberFormatter->format("#,##0", $data->price);
            } elseif ($data->type == 3 || $data->type == 5) {
                echo Yii::app()->numberFormatter->format("#,##0", $data->monthlyrent) . " (monthly rental)";
            }
            ?>
        </div>
        <div class="listing-normal"><?php echo $data->pricetype0->proptype ?></div>
    </div>
    <div class="span3" style="text-align: right">
        <div style="padding-top: 10px;">
            <a href="javascript:PropertyStatusChange(<?php echo $data->pid; ?>);" class="icon_gap" style="text-decoration: none">
                <?php
                if ($data->status == 0) {
                    echo "InActive";
                } elseif ($data->status == 1) {
                    echo "Active";
                } else {
                    echo "Sold";
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
    </div>
</div>
