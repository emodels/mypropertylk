<style type="text/css">
    .qq-upload-list {
        display: none;
    }
    /*.list-view .summary {
        display: none;
    }*/
</style>
<div style="text-align: left; float: left; padding-top: 10px; margin: 0 25px;">
    <div id="vlightbox1" style="border: solid 1px silver; padding: 3px 2px; text-align: center">
        <a class="vlightbox1" href="<?php echo Yii::app()->baseUrl . '/upload/homeideasimages/'.$data->imagename; ?>" title="<?php echo $data->title; ?>"><img src="<?php echo Yii::app()->baseUrl . '/upload/homeideasimages/'.$data->imagename; ?>" alt="<?php echo $data->title; ?>"/></a>
        <div style="margin:0 0 5px 9px; margin-top: 0; background-color: #000; opacity: 0.5; padding: 5px; width: 230px; text-align: left; color: #fff;">
            <?php echo ucwords($data->title);?><br/>
            <?php echo "Uploaded Date: ".$data->dateadded;?>
        </div>
    </div>

</div>



