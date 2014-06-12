<style type="text/css">
    .listing-row{
        height: 80px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_price').addClass('active');

        $('input:text').blur(function () {
            if ($(this).val() == ''){
                $(this).parent().removeClass('success').addClass('error');
                $(this).parent().next('.errorMessage').html('Price can not be blank').css('display','block');
            } else if (isNaN($(obj).prev().val())) {
                $(obj).parent().removeClass('success').addClass('error');
                $(obj).parent().next('.errorMessage').html('Price must be numeric').css('display','block');
            } else {
                $(this).parent().removeClass('error').addClass('success');
                $(this).parent().next('.errorMessage').html('').css('display','none');
            }
        });
    });

    function updatePrice(obj, price_id) {
        var isValid = true;

        if ($(obj).prev().val() == ''){
            $(obj).parent().removeClass('success').addClass('error');
            $(obj).parent().next('.errorMessage').html('Price can not be blank').css('display','block');
            isValid = false;
        }
        if (isNaN($(obj).prev().val())) {
            $(obj).parent().removeClass('success').addClass('error');
            $(obj).parent().next('.errorMessage').html('Price must be numeric').css('display','block');
            isValid = false;
        }

        if (isValid) {
            $(obj).parent().removeClass('error').addClass('success');
            $(obj).parent().next('.errorMessage').html('').css('display','none');

            $.ajax({
                type: "POST",
                data: {priceid: price_id, price_value: $(obj).prev().val()},
                success: function(data){
                    if (data == 'done'){
                        $.fn.yiiGridView.update('grid_pricelist');
                        setTimeout(function(){$('#flshMsg').fadeOut("slow");}, 3000);
                    } else {
                        alert(data);
                    }
                }
            });
        }
    }
</script>

<div class="col_right" style="padding-top: 0;">
    <div class="span12">
        <div class="span12">
            <legend>
                <h3>Price List</h3>
            </legend>
        </div>
    </div>
    <div class="span12" style="margin-left: 0 ">
        <div class="container row-fluid span12">
            <form id="form-price-list" class="form">
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'grid_pricelist',
                'dataProvider' => $dataProvider,
                'ajaxUpdate' => 'flshMsg',
                'htmlOptions'=>array('style'=>'text-align: center; padding-top:0;'),
                'hideHeader'=>true,
                'rowCssClass'=>array('listing-row'),
                'itemsCssClass' => '',
                'enablePagination' => true,
                'template'=>"{items}",
                'columns' => array(
                    array(
                        'type'=>'raw',
                        'value'=>'CHtml::image(Yii::app()->baseUrl . "/upload/priceimages/" . $data->priceimage, "", array("class"=>"listing-addimg"))',
                        'htmlOptions'=>array('class'=>'span4')
                    ),
                    array(
                        'value'=>'$data->proptype',
                        'htmlOptions'=>array('class'=>'span4', 'style'=>'padding:10px 0;')
                    ),
                    array(
                        'type'=>'raw',
                        'value'=>function($data){
                                     return '<div class="input-append">
                                                <input class="span6" id="price_'.$data->priceid.'" name="price_'.$data->priceid.'" type="text" value="'.$data->price.'">
                                                <button class="btn" type="button" onClick="javascript:updatePrice(this,'.$data->priceid.');">Update</button>
                                             </div><div class="errorMessage" id="error_'.$data->priceid.'_em_" style="display:none"></div>';
                                 },
                        'htmlOptions'=>array('class'=>'span4','encode'=>false)
                    )
                )));
            ?>
            </form>
        </div>
    </div>
</div>