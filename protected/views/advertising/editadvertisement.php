<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_adv').addClass('active');
        $('.img-prev').click(function () {
            $('#modal-img').attr('src',$(this).attr('data-href'));
            $('#myModal').modal();
        });

    });

    //--------Load Advertisement Sizes---------//
    function LoadAdSizes(){

        var page = $('#Advertising_page').val();

        $.ajax({
            type: "POST",
            url: '<?php echo Yii::app()->request->baseUrl; ?>/advertising/editadvertisement/id/<?php echo $model->id; ?>',
            data: {page: page, action: 'getAddSizes'},
            success: function(data){

                if (data != ''){

                    $('#Advertising_size').removeAttr('disabled');

                    var array_adSizes = JSON.parse(data);

                    $('#Advertising_size').empty();
                    $('#Advertising_size').append($('<option></option>').val('').text('Select Ad Size'));

                    array_adSizes.forEach(function (element) {

                        $('#Advertising_size').append($('<option></option>').val(element.id).text(element.size));
                    });
                }
            }
        })

    }
    //--------Load Advertisement Prices---------//
    function LoadAdPrices() {

        var size = $('#Advertising_size').val();
        var page = $('#Advertising_page').val();

        $.ajax({
            type: "POST",
            url: '<?php echo Yii::app()->request->baseUrl; ?>/advertising/editadvertisement/id/<?php echo $model->id; ?>',
            data: {size: size, page: page, action: 'getAddPrice'},
            success: function(data){
                if (data != ''){

                    $('#div_price').show();
                    $('#Advertising_price').val(data);
                    $('#Advertising_adprice').val(data);
                    $('#Advertising_period').val(1);

                }
            }
        });

    }
    //-------Cahneg Advertisement Prices According to the Period--------//
    function ChangeAdPrices() {

        var price = parseInt($('#Advertising_adprice').val());
        var period = $('#Advertising_period').val();
        var adprice = 0.00;

        //-----calculate the price for the duration time period---//
        adprice = price*period;
        $('#discount').hide();

        //----calculate the discount price--------------//
        if (period >= 4) {

            var discount = ((adprice)*(10/100));
            adprice = adprice-discount;
            $('#discount').show();
            $('#discount').text("You will get Rs. " + discount + ".00 Discount ...!");

        }

        $('#Advertising_price').val(parseFloat(adprice).toFixed(2));

        //----------calculate the expire date of advertisement---//
        var today = new Date();

        if (period <= 3) {

            today.setDate(today.getDate()+ (period*7));
        }
        if (period >= 4) {

            today.setMonth(today.getMonth()+ (period/4));
        }

        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var y = today.getFullYear();
        var expiredate = y + '/'+ mm + '/'+ dd;

        $('#expdate').val(expiredate);

    }

    //---------------Form Send Function----//

    function formSend(form, data, hasError){

        if ($('#Advertising_adimage').val() != ''){

            var path = $('#Advertising_adimage').val();
            var arrSplit = path.split('.');
            var extension = arrSplit[1].toLowerCase();

            if ($.inArray(extension, ['jpg','jpeg','png','gif']) == -1) {

                alert('Invalid Image File Type');
                hasError = true;
            }

        }

        if (hasError) {

            if ($('.error:first').length > 0){

                $(window).scrollTop($('.error:first').offset().top);
            }

            return false;
        }

        return true;
    }

</script>
<div class="col_right" style="padding-top: 0;">
    <div class="span12" style="border-bottom: solid 1px silver">
        <div class="span7">
            <h3>Edit Advertisement</h3>
        </div>
        <div class="offset2 span2">
            <div class="hidden-phone" style="padding-top: 20px;"></div>
            <!---------( For Add NewUsers )------------------>
            <div class="btn-group" style="padding-bottom: 5px;">
                <button class="btn btn-primary"><a href="<?php echo Yii::app()->request->baseUrl; ?>/advertising/addadvertisement" style="text-decoration: none; color: #ffffff">Add New Advertisement</a></button>
            </div>
            </div>
    </div>
    <div class="span12" style="margin-left: 0;">
        <div class="form">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id'=>'editadvertisement-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'afterValidate' => 'js:formSend',
                ),
                'htmlOptions'=>array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data'),
            )); ?>
            <div class="form_bg span">
                <div class="control-group-admin">
                    <label>Select Page</label>
                    <div>
                        <?php echo $form->dropDownList($model, 'page', CHtml::listData(Adpages::model()->findAll(), 'id', 'page'), array('onChange' => 'javascript:LoadAdSizes();', 'disabled'=>'disabled')); ?><span class="star">*</span>
                        <?php echo $form->error($model,'page'); ?>
                    </div>
                </div>
                <div class="control-group-admin">
                    <label>Select an Advertisement Size & Location</label>
                    <div>
                        <?php
                        foreach(Adprice::model()->findAll('page = ' . $model->page) as $value) {
                            $adSizeListData[$value->size] = $value->size0->size;
                        }
                        ?>
                        <?php echo $form->dropDownList($model, 'size', $adSizeListData, array('onChange' => 'javascript:LoadAdPrices();', 'disabled'=>'disabled')); ?><span class="star">*</span>
                        <?php echo $form->error($model,'size'); ?>
                    </div>
                </div>
                <div class="control-group-admin" id="div_price">
                    <label>Advertisement Price for Selected Size (LKR)</label>
                    <div>
                        <?php echo $form->textField($model,'adprice', array('id'=>'Advertising_price', 'readonly'=> 'readonly')); ?>
                        <?php
                        $array_period= array(1 => '1 Week',
                            2 => '2 Weeks',
                            3 => '3 Weeks',
                            4 => '1 Month',
                            8 => '2 Months',
                            12 => '3 Months',
                            16 => '4 Months',
                            20 => '5 Months',
                            24 => '6 Months',
                            28 => '7 Months',
                            32 => '8 Months',
                            36 => '9 Months',
                            40 => '10 Months',
                            44 => '11 Months',
                            48 => '1 Year',
                            96 => '2 Years',
                        );
                        ?>
                        <?php
                        if (Yii::app()->user->usertype == 0) {

                            echo $form->dropDownList($model, 'period', $array_period, array('empty'=>'Change Period', 'onChange' => 'javascript:ChangeAdPrices();'));

                        } else {

                            echo $form->dropDownList($model, 'period', $array_period, array('empty'=>'Change Period', 'onChange' => 'javascript:ChangeAdPrices();', 'disabled'=>'disabled'));
                        }
                        ?>
                        <label id="discount" hidden="hidden" style="color: #ff0000; font-weight: normal; padding-top: 10px"></label>
                        <input type="text" name="adprice_hidden" id="Advertising_adprice" style="display:none" value="<?php echo $adprice->price; ?>">
                        <div style="color: #3a87ad; background-color: #d9edf7; border: 1px solid #2abdff; padding: 8px 35px 8px 14px; margin-bottom: 10px; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
                            This price for only <b>one week period</b>.<br/> If you like to advertise your advertisement for <b>one month or more</b> we will give you a <b>10% discount</b>...
                        </div>
                    </div>
                </div>
                <div class="control-group-admin">
                    <label>Select an Advertiser</label>
                    <div>
                        <?php echo $form->dropDownList($model, 'advertiser', $advertiserListData); ?><span class="star">*</span>
                        <?php echo $form->error($model, 'advertiser', array('style'=>'width:auto')); ?>
                    </div>
                </div>
                <div class="control-group-admin">
                    <label>Select an Advertisement Image</label>
                    <div>
                        <?php echo $form->fileField($model, 'adimage');
                        if(isset($model->adimage))
                        {
                            echo CHtml::image(Yii::app()->controller->createUrl('upload/adimages/'.$model->adimage), "No Image",array('style'=>'border:solid 1px silver;'));
                        }
                        ?>
                    </div>
                    <div style="margin-bottom: 0; padding: 8px; margin-top: 10px; color: rgba(128, 0, 0, 0.57); background-color: rgba(255, 149, 132, 0.44); border: solid 1px rgba(177, 41, 36, 0.50); border-radius: 5px;">
                        <strong>Warning!</strong><br/> Please check your Advertisement Image width and height is similar to selected ad size, before uploading ...!<hr/>
                        <b>Eg:-</b><br/> If you selected the Advertisement Size of 300 x 250, your <b>Advertisement Image width and height should be exactly 300px and 250px.</b>
                    </div>
                </div>
                <div class="control-group-admin">
                    <?php echo $form->textField($model,'adlink', array('placeholder'=>'Advertisement Link')); ?>
                    <?php echo $form->error($model,'adlink'); ?><span class="star">*</span>
                </div>
                <div class="control-group-admin">
                    <label>Advertisement Expiration Date</label>
                    <div style="color: #3a87ad; background-color: #d9edf7; border: 1px solid #2abdff; padding: 8px 35px 8px 14px; margin-bottom: 20px; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
                        This Advertisement will be expired on :<strong>
                            <?php echo $form->textField($model,'expiredate', array('id'=>'expdate', 'readonly'=> 'readonly')); ?>
                        </strong>
                    </div>
                </div>
                <div class="control-group-admin-btn">
                    <div class="span12" style="padding-top: 5px;">
                        <?php echo CHtml::submitButton('Update', array('class' => 'btn btn-primary')); ?>
                        &nbsp;
                        <?php
                        $url = "";
                        switch (Yii::app()->user->usertype){
                            case 0:
                                $url = Yii::app()->baseUrl . '/admin/home';
                                break;
                            case 1:
                                $url = Yii::app()->baseUrl . '/member/home';
                                break;
                            case 2:
                                $url = Yii::app()->baseUrl . '/agent/home';
                                break;
                            case 3:
                                $url = Yii::app()->baseUrl . '/advertiser/home';
                                break;
                        }
                        ?>
                        <a href="<?php echo $url; ?>" class="btn btn-info">Cancel</a>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
