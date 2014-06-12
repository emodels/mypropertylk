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
            <h3>Add New Advertisement</h3>
        </div>
        <div class="offset2 span2">
            <div class="hidden-phone" style="padding-top: 20px;"></div>
            <!---------( For Add NewUsers )------------------>
            <div class="btn-group" style="padding-bottom: 5px;">
                <button class="btn btn-primary"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/register" style="text-decoration: none; color: #ffffff">Add New Advertisement</a></button>
            </div>
            </div>
    </div>
    <div class="span12" style="margin-left: 0;">
        <form type="post" action="advertisement">
            <div class="form_bg span">
                <div class="control-group-admin">
                    <label>Select Page</label>
                    <div>
                        <select class="btn-small" style="width: auto;">
                            <option>Pages</option>
                            <option>Home</option>
                            <option>Buy</option>
                            <option>Rent</option>
                            <option>Sold</option>
                            <option>Commercial</option>
                            <option>Home Ideas</option>
                            <option>Login</option>
                            <option>Register</option>
                        </select>
                    </div>
                </div>
                <div class="control-group-admin">
                    <label>Select an Advertisement Size & Location</label>
                    <div>
                        <select class="btn-small" style="width: auto;">
                            <option>Size & Location</option>
                            <option>300 x 250 - Page Left</option>
                            <option>300 x 600 - Page Left</option>
                            <option>300 x 60- Page Left</option>
                            <option>600 x 100 - Between Properties</option>
                        </select>
                    </div>
                </div>
                <div class="control-group-admin">
                    <label>Select an Advertiser</label>
                    <div>
                        <select class="btn-small" style="width: auto;">
                            <option>Admin</option>
                            <option>Advertiser 1</option>
                            <option>Advertiser 2</option>
                            <option>Advertiser 3</option>
                            <option>Advertiser 4</option>
                        </select>
                    </div>
                </div>
                <div class="control-group-admin">
                    <label>Select an Advertisement Image</label>
                    <div>
                        <input type="file" name="file" id="file"><br>
                        <input type="submit" name="Upload" value="Upload" class="btn">
                    </div>
                </div>
                <div class="control-group-admin">
                    <label>Advertisement Expiration Date</label>
                    <input type="date">
                </div>

                <div class="control-group-admin-btn">
                    <div class="span12" style="padding-top: 5px;">
                        <?php echo CHtml::submitButton('Add', array('class' => 'btn btn-primary')); ?>&nbsp;
                        <?php echo CHtml::submitButton('Cancel', array('class' => 'btn btn-info')); ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
