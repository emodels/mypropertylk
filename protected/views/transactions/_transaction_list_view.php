<div class="row-fluid">
    <div class="span listing-row">
        <div class="span1">
            <?php echo $data->id ?>
        </div>
        <div class="span2">
            <?php echo $data->referenceid ?>
        </div>
        <div class="span2">
            <?php
            if ($data->type == 1) {

                echo "Property";
            }
            if ($data->type == 2) {

                echo "Advertisement";
            }
            ?>
        </div>
        <div class="span2">
            <?php echo $data->transactiondate ?>
        </div>
        <div class="span2">
            <?php echo $data->amount ?>
        </div>
        <div class="span3">
            <?php
            if ($data->status == 0) {

                echo "Pending";
            }
            if ($data->status == 1) {

                echo "Complete";
            }
            ?>
        </div>
    </div>
</div>
