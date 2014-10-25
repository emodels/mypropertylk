<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_adv').addClass('active');
        $('.img-prev').click(function () {
            $('#modal-img').attr('src',$(this).attr('data-href'));
            $('#myModal').modal();
        });
    });

    function Delete_Ad(id){
        if (confirm('Are you sure want to delete?'))
        {
            $.ajax({
                type: "GET",
                url: 'advertisement/mode/DELETE/id/' + id,
                success: function(data){
                    if (data == 'done'){
                        $.fn.yiiListView.update('list_advertisement');

                    } else {
                        alert(data);
                    }
                }
            });
        }
    }

    function AdStatusChange(id) {
        $.ajax({
            type: "GET",
            url: 'advertisement/mode/STATUS/id/' + id,
            success: function(data){
                if (data == 'done'){
                    $.fn.yiiListView.update('list_advertisement');
                } else {
                    alert(data);
                }
            }
        });
    }

    function Filter_Advertisement(){

        var page = '';
        var size = '';

        if ($('#filter_pages').val() != '') {
            page = $('#filter_pages').val();
        }
        if ($('#filter_sizes').val() != '') {
            size = $('#filter_sizes').val();
        }

        $.fn.yiiListView.update('list_advertisement',{data: {'page': page, 'size': size}});
    }

</script>
<div class="col_right" style="padding-top: 0;">
    <div class="container-fluid" style="padding: 0">
        <div class="span12" style="border-bottom: solid 1px silver">
            <div class="span3">
                <h3>Advertising</h3>
            </div>
            <div class="offset4 span5">
                <div class="hidden-phone" style="padding-top: 20px;"></div>
                <div style="padding-bottom: 5px;">
                    <!---------( For View Advertisement Price List )------------------>
                    <?php if (Yii::app()->user->usertype == 0) { ?>
                        <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/advertising/adpricelisting" style="text-decoration: none; color: #ffffff">View Price list</a>
                    <?php } else { ?>
                        <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/advertising/adpricelistingprint" style="text-decoration: none; color: #ffffff" target="_blank">View Price list</a>
                    <?php } ?>
                    <!---------( For Add New Advertisements )------------------>
                    <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/advertising/addadvertisement" style="text-decoration: none; color: #ffffff">Add New Advertisement</a>
                </div>
            </div>
        </div>
        <div class="span12" style="margin-left: 0; border-bottom: solid 1px silver ">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id'=>'advertisement-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                ),
                'htmlOptions'=>array('class'=>'form-horizontal'),
            )); ?>
            <div class="form_bg span">
                <div class="span4">
                    <select class="btn-small" style="width: auto;" id="filter_pages" onchange="javascript:Filter_Advertisement();">
                        <option value="" >Filter by Page</option>
                        <?php

                        $pageList = Adpages::model()->findAll();

                        //var_dump($pageList);
                        foreach($pageList as $value){

                            echo "<option value=" . $value->id . " >" . $value->page . "</option>";
                        }

                        ?>
                    </select>
                </div>
                <div class="visible-phone" style="padding-top: 5px;"></div>
                <div class="offset4 span4">
                    <select class="btn-small" style="width: auto;" id="filter_sizes" onchange="javascript:Filter_Advertisement();">
                        <option value="" >Filter by Ad Size</option>
                        <?php

                        $pageList = Adsizes::model()->findAll();

                        //var_dump($pageList);
                        foreach($pageList as $value){

                            echo "<option value=" . $value->id . " >" . $value->size . "</option>";
                        }

                        ?>
                    </select>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
        <div class="span12" style="margin-left: 0 ">
            <div class="container-fluid" style="padding: 0">
                <?php
                $page_filter = '';
                $size_filter = '';

                if (Yii::app()->request->isAjaxRequest && isset($_GET['page'])) {

                    $page_filter = ($_GET['page'] == '') ? '' : $_GET['page'] ;
                    //echo $status_filter;
                }

                if (Yii::app()->request->isAjaxRequest && isset($_GET['size'])) {

                    $size_filter = ($_GET['size'] == '') ? '' : $_GET['size'] ;
                    //echo $status_filter;
                }

                if (Yii::app()->user->usertype == 0) {

                    $condition = '';

                } else {

                    $condition = 'advertiser = ' . Yii::app()->user->id;
                }

                if ($page_filter != '') {

                    if ($condition != "") {

                        $condition .= ' AND page = ' . $page_filter;
                    } else {

                        $condition .= 'page = ' . $page_filter;
                    }
                }

                if ($size_filter != '') {

                    if ($condition != "") {

                        $condition .= ' AND size = ' . $size_filter;
                    } else {

                        $condition .= 'size = ' . $size_filter;
                    }

                }

                $this->widget('zii.widgets.CListView', array(
                    'id' => 'list_advertisement',
                    'dataProvider'=>new CActiveDataProvider('Advertising', array('criteria'=>array('condition'=> $condition,'order' => 'entrydate DESC'),'pagination'=>array('pageSize'=>10))),
                    'itemView' => '_advertisement_list_view',
                    'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>',
                    'afterAjaxUpdate'=>'function(id,options){window.scroll(0,0);}',
                ));
                ?>
            </div>
        </div>
    </div>
</div>
