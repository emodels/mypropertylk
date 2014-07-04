<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_adv').addClass('active');
        $('.img-prev').click(function () {
            $('#modal-img').attr('src',$(this).attr('data-href'));
            $('#myModal').modal();
        });
    });

    function Delete_Prices(id){
        if (confirm('Are you sure want to delete?'))
        {
            $.ajax({
                type: "GET",
                url: 'adpricelisting/mode/DELETE/id/' + id,
                success: function(data){
                    if (data == 'done'){
                        $.fn.yiiListView.update('list_price');

                    } else {
                        alert(data);
                    }
                }
            });
        }
    }

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
        <div class="offset4 span2">
            <div class="hidden-phone" style="padding-top: 20px;"></div>
            <div style="padding-bottom: 5px;">
                <!---------( For View Advertisement Price List )------------------>
                <?php if (Yii::app()->user->usertype == 0) {?>
                    <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/advertising/addprices" style="text-decoration: none; color: #ffffff">Add Prices</a>
                <?php } ?>
            </div>
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
                'dataProvider'=>new CActiveDataProvider('Adprice', array('criteria'=>array('condition'=> $condition,'order' => 'id'),'pagination'=>array('pageSize'=>10))),
                'itemView' => '_adprice_list_view',
                'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>'
            ));
            ?>
        </div>
    </div>
</div>
