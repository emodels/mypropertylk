<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_adv').addClass('active');
        $('.img-prev').click(function () {
            $('#modal-img').attr('src',$(this).attr('data-href'));
            $('#myModal').modal();
        });
    });
</script>
<div class="col_right" style="padding-top: 0;">
    <div class="span12" style="border-bottom: solid 1px silver">
        <div class="span7">
            <h3>Advertisement Sample Sizes</h3>
        </div>
        <div class="offset2 span2">
            <div class="hidden-phone" style="padding-top: 20px;"></div>
            <!---------( For Add NewUsers )------------------>
            <div class="btn-group" style="padding-bottom: 5px;">
                <button class="btn btn-primary"><a href="<?php echo Yii::app()->request->baseUrl; ?>/advertising/addadvertisement" style="text-decoration: none; color: #ffffff">Add New Advertisement</a></button>
            </div>
        </div>
    </div>
    <div class="span12" style="margin-left: 0; padding-top: 20px;">
        <div class="row-fluid" style="margin-bottom: 10px;">
            <div class="alert">
                <h4>These are our available Ad Sizes!</h4>
            </div>
        </div>
       <div class="row-fluid">
           <div class="span6">
               <div style="padding-bottom: 10px;">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/300x60_l.png" width="300" height="60" class="img-thumb"/>
               </div>
               <div style="padding-bottom: 10px;">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/300x250_l.png" width="300" height="250" class="img-thumb"/>
               </div>
               <div style="padding-bottom: 10px;">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/300x600_left.png" width="300" height="600" class="img-thumb"/>
               </div>
           </div>
           <div class="offset1 span5">
               <div style="padding-bottom: 10px;">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/300x60_r.png" width="300" height="60" class="img-thumb"/>
               </div>
               <div style="padding-bottom: 10px;">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/300x250_r.png" width="300" height="250" class="img-thumb"/>
               </div>
               <div style="padding-bottom: 10px;">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/300x600_right.png" width="300" height="600" class="img-thumb"/>
               </div>
           </div>
       </div>
       <div class="row-fluid">
            <div class="span10">
                <div style="padding-bottom: 10px;">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/600x100.png" width="600" height="100" class="img-thumb"/>
                </div>
                <div style="padding-bottom: 10px;">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/adsizes/900x100.png" width="900" height="100" class="img-thumb"/>
                </div>
            </div>
       </div>
    </div>
</div>
