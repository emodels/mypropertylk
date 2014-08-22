<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_adv').addClass('active');
        $('.img-prev').click(function () {
            $('#modal-img').attr('src',$(this).attr('data-href'));
            $('#myModal').modal();
        });
    });

    function Filter_Adprices(){

        var page = '';

        if ($('#filter_pages').val() != '') {
            page = $('#filter_pages').val();
        }

        $.fn.yiiListView.update('list_price',{data: {'page': page}});
    }
</script>
<div class="col_right" style="padding-top: 0;">
    <div class="span12" style="border-bottom: solid 1px silver">
        <div class="span6">
            <h3>Advertisement Price List</h3>
        </div>
    </div>
    <div class="span12" style="margin-left: 0; border-bottom: solid 1px silver ">
        <div class="form_bg span">
            <div class="offset9 span3">
                <select class="btn-small" style="width: auto;" id="filter_pages" onchange="javascript:Filter_Adprices();">
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
        </div>
    </div>
    <div class="span12" style="margin-left: 0 ">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'adpricelist-form',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
            ),
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
        <div class="container-fluid" style="padding: 0;">
            <?php
            $page_filter = '';

            if (Yii::app()->request->isAjaxRequest && isset($_GET['page'])) {

                $page_filter = ($_GET['page'] == '') ? '' : $_GET['page'] ;
                //echo $status_filter;
            }

            $condition = '';

            if ($page_filter != '') {

                $condition .= 'page = ' . $page_filter;
            }

            $this->widget('zii.widgets.CListView', array(
                'id' => 'list_price',
                'dataProvider'=>new CActiveDataProvider('Adprice', array('criteria'=>array('condition'=> $condition,'order' => 'page'),'pagination'=>false)),
                'itemView' => '_adprice_list_print_view',
                'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>',
                'afterAjaxUpdate'=>'function(id,options){window.scroll(0,0);}',
            ));
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
