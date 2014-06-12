<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_manage').addClass('active');
    });

    function Delete_User(id){
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
                <button class="btn btn-primary"><a href="<?php echo Yii::app()->request->baseUrl; ?>/agent/adduser" style="text-decoration: none; color: #ffffff">Add New User</a></button>
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
            <div class="offset2 span4">
                <select class="btn-small" style="width: auto;">
                    <option>Status</option>
                    <option>Active</option>
                    <option>InActive</option>
                </select>
            </div>
        </div>
    </div>
    <div class="span12" style="margin-left: 0 ">
        <div class="container row-fluid" style="margin-left: 0">
            <?php
            $condition =  'parentuser = ' . Yii::app()->user->id . ' AND id !=' . Yii::app()->user->id;

            $this->widget('zii.widgets.CListView', array(
                'id' => 'list_user',
                'dataProvider'=>new CActiveDataProvider('User', array('criteria'=>array('condition'=> $condition,'order' => 'id DESC'),'pagination'=>array('pageSize'=>5))),
                'itemView' => '_user_list_view',
                'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>'
            ));
            ?>
        </div>
    </div>
</div>