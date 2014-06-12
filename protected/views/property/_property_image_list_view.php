<style type="text/css">
    .qq-upload-list {
        display: none;
    }
    .list-view .summary {
        display: none;
    }
</style>
<div style="text-align: left; float: left; padding-top: 10px;">
    <a href="#">
        <ul style="float: left;">
            <li>
                <div class="prop-img-upload">
                    <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'.$data->imagename; ?>" style="width: 107px; height: 107px;"/>
                </div>
                <div style="text-align: center;">
                    <a href="javascript:Delete_Image(<?php echo $data->id; ?>);" style="text-decoration: none; cursor: default;">Remove</i></a>
                </div>
            </li>
        </ul>
    </a>
</div>

