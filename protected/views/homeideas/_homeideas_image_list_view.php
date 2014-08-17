<style type="text/css">
    .qq-upload-list {
        display: none;
    }
    .list-view .summary {
        display: none;
    }
</style>
<div style="text-align: left; float: left; padding-top: 10px; margin: 0 25px;">
    <div id="vlightbox1">
        <a class="vlightbox1" href="<?php echo Yii::app()->baseUrl . '/upload/homeideasimages/'.$data->imagename; ?>" title="<?php echo $data->title; ?>"><img src="<?php echo Yii::app()->baseUrl . '/upload/homeideasimages/'.$data->imagename; ?>" alt="<?php echo $data->title; ?>" style="height: 180px; width: 240px;"/></a>
        <div style="margin: 5px; margin-top: 0; background-color: #000; opacity: 0.5; padding: 5px; width: 230px;">
            <a href="<?php echo Yii::app()->request->baseUrl .'/homeideas/edithomeideas?id='. $data->id ;?>" title="edit" style="color: #fff; text-decoration: none; padding-left: 5px"> <i class="icon-edit icon_gap"></i></a>
            <a href="javascript:Delete_Homeideas(<?php echo $data->id; ?>);" title="delete" style="text-decoration: none; color: #fff; padding-left: 180px"><i class="icon-trash icon_gap"></i></a>
        </div>
    </div>
</div>



