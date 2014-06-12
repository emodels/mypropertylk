<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_manage').addClass('active');
    });
</script>
<div class="col_right" style="padding-top: 0;">
    <div class="span12" style="border-bottom: solid 1px silver">
        <div class="span7">
            <h3>Mange Users</h3>
        </div>
        <div class="offset3 span2">
            <div class="hidden-phone" style="padding-top: 20px;"></div>
            <!---------( For Add NewUsers )------------------>
            <div class="btn-group" style="padding-bottom: 5px;">
                <button class="btn btn-primary"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/register" style="text-decoration: none; color: #ffffff">Add New User</a></button>
            </div>
        </div>
    </div>
    <div class="span12" style="margin-left: 0; border-bottom: solid 1px silver ">
        <div class="form_bg span">
            <div class="span6">
                <form class="form-search" style="margin-bottom: 0">
                    <div class="input-append">
                        <input type="text" class="span10 search-query" placeholder="User ID, Name">
                        <button type="submit" class="btn"><i class="icon-search"></i>&nbsp;Find</button>
                    </div>
                </form>
            </div>
            <div class="visible-phone" style="padding-top: 5px;"></div>
            <div class="offset2 span2">
                <select class="btn-small" style="width: auto;">
                    <option>Status</option>
                    <option>Active</option>
                    <option>InActive</option>
                </select>
            </div>
            <div class="visible-phone" style="padding-top: 5px;"></div>
            <div class="span2">
                <select class="btn-small" style="width: auto;">
                    <option>Type</option>
                    <option>Member</option>
                    <option>Agents</option>
                    <option>Advertiser</option>
                </select>
            </div>
        </div>
    </div>
    <div class="span12" style="margin-left: 0 ">
        <div class="container row-fluid span listing-row">
            <div class="span2">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/user_no_img.png" class="listing-userimg">
            </div>
            <div class="span5">
                <div class="listing-Address">John Smith</div>
                <div class="listing-normal">#2323</div>
                <div class="listing-small">John@gamil.com</div>
                <div class="listing-small">077121212</div>
            </div>
            <div class="offset2 span3">
                <div class="listing-normal">Agent</div>
                <div class="hidden-phone"></br></br></div>
                <div class="listing-btn">
                    <a href="#" class="icon_gap lnkno-style">In-Active</a>
                    <a href="#" class="lnkno-style" title="edit  "><i class="icon-edit icon_gap"></i></a>
                    <a href="#" class="lnkno-style" title="delete"><i class="icon-remove icon_gap"></i></a>
                </div>
            </div>
        </div>
        <div class="container row-fluid span listing-row" style="margin-left: 0">
            <div class="span2">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/user_no_img.png" class="listing-userimg">
            </div>
            <div class="span5">
                <div class="listing-Address">John Smith</div>
                <div class="listing-normal">#2323</div>
                <div class="listing-small">John@gamil.com</div>
                <div class="listing-small">077121212</div>
            </div>
            <div class="offset2 span3">
                <div class="listing-normal">Agent</div>
                <div class="hidden-phone"></br></br></div>
                <div class="listing-btn">
                    <a href="#" class="icon_gap lnkno-style">In-Active</a>
                    <a href="#" class="lnkno-style" title="edit  "><i class="icon-edit icon_gap"></i></a>
                    <a href="#" class="lnkno-style" title="delete"><i class="icon-remove icon_gap"></i></a>
                </div>
            </div>
        </div>
        <div class="container row-fluid span listing-row" style="margin-left: 0">
            <div class="span2">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/user_no_img.png" class="listing-userimg">
            </div>
            <div class="span5">
                <div class="listing-Address">John Smith</div>
                <div class="listing-normal">#2323</div>
                <div class="listing-small">John@gamil.com</div>
                <div class="listing-small">077121212</div>
            </div>
            <div class="offset2 span3">
                <div class="listing-normal">Agent</div>
                <div class="hidden-phone"></br></br></div>
                <div class="listing-btn">
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