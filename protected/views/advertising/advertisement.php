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
            <h3>Advertising</h3>
        </div>
        <div class="offset2 span2">
            <div class="hidden-phone" style="padding-top: 20px;"></div>
            <!---------( For Add NewUsers )------------------>
            <div class="btn-group" style="padding-bottom: 5px;">
                <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/advertising/addadvertisement" style="text-decoration: none; color: #ffffff">Add New Advertisement</a>
            </div>
        </div>
    </div>
    <div class="span12" style="margin-left: 0; border-bottom: solid 1px silver ">
        <div class="form_bg span">
            <div class="span2">
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
            <div class="visible-phone" style="padding-top: 5px;"></div>
            <div class="span4">
                <select class="btn-small" style="width: auto;">
                    <option>Size</option>
                    <option>300 x 250 - Page Left</option>
                    <option>300 x 600 - Page Left</option>
                    <option>300 x 60- Page Left</option>
                    <option>600 x 100 - Between Properties</option>
                </select>
            </div>
        </div>
    </div>
    <div class="span12" style="margin-left: 0 ">
        <div class="container row-fluid span listing-row">
            <div class="span5">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/geico-banner.jpg">
                </a>
            </div>
            <div class="span2">
                <div class="listing-normal">Page</div>
                <div class="listing-normal">Size</div>
                <div class="listing-normal">Position</div>
            </div>
            <div class="offset2 span3">
                <div class="hidden-phone"></br></div>
                <div>
                    <a href="#" class="icon_gap lnkno-style">In-Active</a>
                    <a href="#" class="lnklnkno-style" title="edit  "><i class="icon-edit icon_gap"></i></a>
                    <a href="#" class="lnklnkno-style" title="delete"><i class="icon-remove icon_gap"></i></a>
                </div>
            </div>
        </div>
        <div class="container row-fluid span listing-row" style="margin-left: 0">
            <div class="span5">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ad.jpg">
                </a>
            </div>
            <div class="span2">
                <div class="listing-normal">Page</div>
                <div class="listing-normal">Size</div>
                <div class="listing-normal">Position</div>
            </div>
            <div class="offset2 span3">
                <div class="hidden-phone"></br></div>
                <div>
                    <a href="#" class="icon_gap lnkno-style">In-Active</a>
                    <a href="#" class="lnklnkno-style" title="edit  "><i class="icon-edit icon_gap"></i></a>
                    <a href="#" class="lnklnkno-style" title="delete"><i class="icon-remove icon_gap"></i></a>
                </div>
            </div>
        </div>
        <div class="container row-fluid span listing-row" style="margin-left: 0">
            <div class="span5">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ad_large.jpg">
                </a>
            </div>
            <div class="span2">
                <div class="listing-normal">Page</div>
                <div class="listing-normal">Size</div>
                <div class="listing-normal">Position</div>
            </div>
            <div class="offset2 span3">
                <div class="hidden-phone"></br></div>
                <div>
                    <a href="#" class="icon_gap lnkno-style">In-Active</a>
                    <a href="#" class="lnklnkno-style" title="edit  "><i class="icon-edit icon_gap"></i></a>
                    <a href="#" class="lnklnkno-style" title="delete"><i class="icon-remove icon_gap"></i></a>
                </div>
            </div>
        </div>
        <div class="container row-fluid span">
            <div class="pagination pagination-small pagination-centered">
                <ul>
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
