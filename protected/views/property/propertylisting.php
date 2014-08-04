<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_list').addClass('active');

        $('#propertyid').keypress(function(event) {
            if (event.which == 13) {
                event.preventDefault();
            }
        });

        var pid = '<?php echo (isset($_GET["pid"]) ? $_GET["pid"] : "");?>'

        if (pid != '') {

            $('#propertyid').val(pid);
            setTimeout(function(){ Filter_Property(); }, 500);

        } else {

            $('#list_property').show();
        }
    });

    function Delete_Property(id){

        if (confirm('Are you sure want to delete?'))
        {
            $.ajax({
                type: "GET",
                url: 'propertylisting/mode/DELETE/pid/' + id,
                success: function(data){
                    if (data == 'done'){
                        $.fn.yiiListView.update('list_property');
                    } else {
                        alert(data);
                    }
                }
            });
        }

    }

    function Filter_Property(){

        var sort = '';
        var agent = '';
        var status = '';
        var pid = '';

        if ($('#filter_sort').val() != '') {
            sort = $('#filter_sort').val();
        }

        if ($('#filter_agent').val() != '') {
            agent = $('#filter_agent').val();
        }

        if ($('#filter_status').val() != '') {
            status = $('#filter_status').val();
        }

        if ($('#propertyid').val() != '') {
            pid = $('#propertyid').val();
        }

        $.fn.yiiListView.update('list_property',{data: {'sort': sort, 'agent': agent, 'status': status, 'pid': pid},
            complete:function() {
                $('#list_property').show();
            }});
    }

    function PropertyStatusChange(id) {
        $.ajax({
            type: "GET",
            url: 'propertylisting/mode/STATUS/pid/' + id,
            success: function(data){
                if (data == 'done'){
                    $.fn.yiiListView.update('list_property');
                }
                else {
                    alert(data);
                }
            }
        });
    }

    function PropertySold(id) {
        $.ajax({
            type: "GET",
            url: 'propertylisting/mode/SOLD/pid/' + id,
            success: function(data){
                if (data == 'done'){
                    $.fn.yiiListView.update('list_property');
                } else {
                    alert(data);
                }
            }
        });
    }

    function ViewProperty(id) {
        window.open('<?php echo Yii::app()->request->baseUrl; ?>/list/detail/pid/' + id);
    }

</script>
<?php
//-----------get type------//
$model = array();
if (isset($_GET['type'])) {
    $model['type'] = $_GET['type'];
}
$model = (object) $model;
//Yii::app()->request->cookies['type'] = new CHttpCookie('type', $_GET['type']);

?>
<div class="col_right" style="padding-top: 0;">
    <div class="form">
        <div class="span12" style="border-bottom: solid 1px silver">

            <div class="span9">
                <h3>Your Listings</h3>
            </div>
            <div class="span3" style="padding-top: 20px;">
                <div class="btn-group">
                    <button class="btn btn-primary"><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=1" style="text-decoration: none; color: #ffffff">Add New Listings</a></button>
                    <button class="btn dropdown-toggle btn-primary" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=1">Home Sales</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=2"">Land Sales</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=3"">Home Rental</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=4"">Commercial Sales</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=5"">Commercial Leased</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="span12" style="padding-top: 10px; padding-bottom:10px; margin-left: 0; border-bottom: solid 1px silver">
            <div class="span3" style="padding-right: 10px; padding-left: 10px;">
                <div class="btn-group">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
                        if (isset($model->type)) {

                            switch ($model->type){
                                case 0:
                                    echo 'Category';
                                    break;
                                case 1:
                                    echo 'Home Sales';
                                    break;
                                case 2:
                                    echo 'Land Sales';
                                    break;
                                case 3:
                                    echo 'Home Rental';
                                    break;
                                case 4:
                                    echo 'Commercial Sales';
                                    break;
                                case 5:
                                    echo 'Commercial Leased';
                                    break;
                            }

                        }
                        ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=0">All Properties</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=1">Home Sales</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=2">Land Sales</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=3">Home Rental</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=4">Commercial Sales</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=5">Commercial Leased</a></li>
                    </ul>
                </div>
            </div>
            <div class="span2">
                <select class="btn-small" style="width: auto;" id="filter_status" onchange="javascript:Filter_Property();">
                    <option value="">Status</option>
                    <option value="0">In Active</option>
                    <option value="1">Active</option>
                    <option value="2">Sold</option>
                </select>
            </div>
            <?php if (Yii::app()->user->usertype == 0) {?>
            <div class="span2">
                <?php echo CHtml::dropDownList('filter_agent', '', CHtml::listData(User::model()->findAll('usertype = 2'),'id', 'fname'),
                      array('empty'=>'All Agents', 'class'=>'btn-small', 'style'=>'width: auto', 'onChange'=>'javascript:Filter_Property();')); ?>
            </div>
            <?php }?>
            <div class="span2">
                <select class="btn-small" style="width: auto;" id="filter_sort" onchange="javascript:Filter_Property();">
                    <option value="">Sort By</option>
                    <option value="entrydate">Date</option>
                    <option value="district">District</option>
                    <option value="pricetype">Property Type</option>
                    <option value="price">Price</option>
                    <option value="agent">Agent</option>
                </select>
            </div>
            <div class="span3">
                <div class="span8">
                    <form class="form-search" style="margin-bottom: 0">
                        <div class="input-append">
                            <?php echo CHtml::textField('propertyid', '', array('class' => 'span12 search-query', 'placeholder'=>'Enter Property ID')); ?>
                            <a href="javascript:Filter_Property();" class="btn" style="margin-left: 0px;"><i class="icon-search"></i>&nbsp;Find</a>
                        </div>
                    </form>
                </div>
                <div class="span2" style="float: right">
                    <p class="btn-mini"></p>
                </div>
            </div>
        </div>
        <div class="span12" style="margin-left: 0 ">

            <div class="container row-fluid">
                <?php
                $sort_order = 'pid DESC';
                $status_filter = '';
                $agent_filter = '';
                $pid_filter = '';

                if (Yii::app()->request->isAjaxRequest && isset($_GET['sort'])) {

                    $sort_order = ($_GET['sort'] == '') ? 'pid DESC' : $_GET['sort'] ;
                }

                if (Yii::app()->request->isAjaxRequest && isset($_GET['status'])) {

                    $status_filter = ($_GET['status'] == '') ? '' : $_GET['status'] ;
                }

                if (Yii::app()->request->isAjaxRequest && isset($_GET['agent'])) {

                    $agent_filter = ($_GET['agent'] == '') ? '' : $_GET['agent'] ;
                }

                if (Yii::app()->request->isAjaxRequest && isset($_GET['pid'])) {

                    $pid_filter = ($_GET['pid'] == '') ? '' : $_GET['pid'] ;
                }

                if (Yii::app()->user->usertype != 0) {

                    $owner = User::model()->findByPk(Yii::app()->user->id);

                    if ($owner->parentuser == 0) {

                        $condition =  (($model->type == 0) ? 'type > 0' : 'type = ' . $model->type) . ' AND owner = ' . Yii::app()->user->id;

                    } else {

                        $company_users_all = User::model()->findAll('parentuser = ' . $owner->parentuser);
                        $company_users_array = array();

                        $company_users_array[] = $owner->parentuser;

                        foreach ($company_users_all as $value){
                            $company_users_array[] = $value->id;
                        }

                        $condition =  (($model->type == 0) ? 'type > 0' : 'type = ' . $model->type) . ' AND owner IN (' . implode(',', $company_users_array) . ')';
                    }

                } else {

                    $condition =  (($model->type == 0) ? 'type > 0' : 'type = ' . $model->type) /*. ' AND status = 1' */;
                }

                /*---( Filter records by Agent )---*/
                if ($agent_filter != '') {

                    $condition .= ' AND agent = ' . $agent_filter;
                }

                if ($status_filter != '') {

                    $condition .= ' AND status = ' . $status_filter;
                } else {

                    $condition .= ' AND status != 2 ';
                }

                if ($pid_filter != '') {

                    $condition .= ' AND pid = ' . $pid_filter;
                }

                $this->widget('zii.widgets.CListView', array(
                    'id' => 'list_property',
                    'dataProvider'=>new CActiveDataProvider('Property', array('criteria'=>array('condition'=> $condition,'order' => $sort_order),'pagination'=>array('pageSize'=>15))),
                    'itemView' => '_property_list_view',
                    'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>',
                    'afterAjaxUpdate'=>'function(id,options){window.scroll(0,0);}',
                    'htmlOptions'=>array('style'=>'display:none')
                ));
                ?>
            </div>

        </div>
    </div>
</div>