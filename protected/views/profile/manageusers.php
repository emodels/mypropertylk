<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_manage').addClass('active');
    });

    function Delete_User(id){
        if (confirm('Are you sure want to delete?'))
        {
            $.ajax({
                type: "GET",
                url: 'manageusers/mode/DELETE/id/' + id,
                success: function(data){
                    if (data == 'done'){
                        $.fn.yiiListView.update('list_user');

                    } else {
                        alert(data);
                    }
                }
            });
        }
    }

    function UserStatusChange(id) {
        $.ajax({
            type: "GET",
            url: 'manageusers/mode/STATUS/id/' + id,
            success: function(data){
                if (data == 'done'){
                    $.fn.yiiListView.update('list_user');
                } else {
                    alert(data);
                }
            }
        });
    }

    function Filter_Users(){

        var status = '';
        var usertype = '';
        var fname = '';

        if ($('#filter_status').val() != '') {
            status = $('#filter_status').val();
        }

        if ($('#filter_usertype').val() != '') {
            usertype = $('#filter_usertype').val();
        }
        if ($('#fname').val() != '') {
            fname = $('#fname').val();
        }

        $.fn.yiiListView.update('list_user',{data: {'status': status, 'usertype': usertype, 'fname': fname}});
    }

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
                <button class="btn btn-primary"><a href="<?php echo Yii::app()->request->baseUrl; ?>/profile/adduser" style="text-decoration: none; color: #ffffff">Add New User</a></button>
            </div>
        </div>
    </div>
    <div class="span12" style="margin-left: 0; border-bottom: solid 1px silver ">
        <div class="form_bg span">
            <div class="span6">
                <form class="form-search" style="margin-bottom: 0">
                    <div class="input-append">
                        <?php echo CHtml::textField('fname', '', array('class' => 'span10 search-query', 'placeholder'=>'Enter First Name')); ?>
                        <a href="javascript:Filter_Users();" class="btn" style="margin-left: 0px;"><i class="icon-search"></i>&nbsp;Find</a>
                    </div>
                </form>
            </div>
            <div class="visible-phone" style="padding-top: 5px;"></div>
            <div class="offset2 span2">
                <select class="btn-small" style="width: auto;" id="filter_status" onchange="javascript:Filter_Users();">
                    <option value="" >Status</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
            <div class="visible-phone" style="padding-top: 5px;"></div>
            <?php if (Yii::app()->user->usertype == 0) {?>
            <div class="span2">
                <select class="btn-small" style="width: auto;" id="filter_usertype" onchange="javascript:Filter_Users();">
                    <option value="">Type</option>
                    <option value="1">Member</option>
                    <option value="2">Agents</option>
                    <option value="3">Advertiser</option>
                </select>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="span12" style="margin-left: 0 ">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'userlisting-form',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'afterValidate' => 'js:formSend',
            ),
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
        <div class="container row-fluid" style="margin-left: 0">
            <?php
            $status_filter = '';
            $type_filter = '';
            $fname_filter = '';

            if (Yii::app()->request->isAjaxRequest && isset($_GET['status'])) {

                $status_filter = ($_GET['status'] == '') ? '' : $_GET['status'] ;
                //echo $status_filter;
            }

            if (Yii::app()->request->isAjaxRequest && isset($_GET['usertype'])) {

                $type_filter = ($_GET['usertype'] == '') ? 'usertype > 0' : $_GET['usertype'] ;
            }

            if (Yii::app()->request->isAjaxRequest && isset($_GET['fname'])) {

                $fname_filter = ($_GET['fname'] == '') ? '' : $_GET['fname'] ;
            }


            if (Yii::app()->user->usertype == 0) {
                $condition = 'usertype != 0';

            } else {
                $condition = 'parentuser = ' . Yii::app()->user->id;

            }

            if ($status_filter != '') {

                $condition .= ' AND status = ' . $status_filter;
            }

            if ($type_filter != '') {

                $condition .= ' AND usertype = ' . $type_filter;
            }

            if ($fname_filter != '') {

                $condition .= ' AND fname like "' . $fname_filter . '%"';
            }

            $this->widget('zii.widgets.CListView', array(
                'id' => 'list_user',
                'dataProvider'=>new CActiveDataProvider('User', array('criteria'=>array('condition'=>$condition,'order' => 'id DESC'),'pagination'=>array('pageSize'=>5))),
                'itemView' => '_user_list_view',
                'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>'
            ));
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>