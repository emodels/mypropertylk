<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_list').addClass('active');
    });

    function Delete_Property(id){
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

    function PropertyStatusChange(id) {
        $.ajax({
            type: "GET",
            url: 'propertylisting/mode/STATUS/pid/' + id,
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
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=4">Home Ideas</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=5"">Commercial Sales</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=6"">Commercial Leased</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="span12" style="padding-top: 10px; padding-bottom:10px; margin-left: 0; border-bottom: solid 1px silver">
            <div class="span2" style="padding-right: 10px; padding-left: 10px;">
                <div class="btn-group">
                    <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
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
                <select class="btn-small" style="width: auto;">
                    <option>Status</option>
                    <option>Active</option>
                    <option>In Active</option>
                    <option>Sold</option>
                </select>
            </div>
            <?php if (Yii::app()->user->usertype == 0) {?>
            <div class="span2">
                <select class="btn-small" style="width: auto;">
                    <option>Agents</option>
                    <option>All Agents</option>
                    <option>Not Specified</option>
                    <option>Agent 1</option>
                    <option>Agent 2</option>
                </select>
            </div>
            <?php }?>
            <div class="span2">
                <select class="btn-small" style="width: auto;">
                    <option>Sort By</option>
                    <option>Date</option>
                    <option>Street</option>
                    <option>District</option>
                    <option>Province</option>
                    <option>Price</option>
                    <option>Agent</option>
                </select>
            </div>
            <div class="span4">
                <div class="span9">
                    <form class="form-search" style="margin-bottom: 0">
                        <div class="input-append">
                            <input type="text" class="span12 search-query" placeholder="Enter Property ID, Address / District">
                            <button type="submit" class="btn" style="margin-left: 0px;"><i class="icon-search"></i>&nbsp;Find</button>
                        </div>
                    </form>
                </div>
                <div class="span2" style="float: right">
                    <p class="btn-mini"></p>
                </div>
            </div>
        </div>
        <div class="span12" style="margin-left: 0 ">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id'=>'propertylisting-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'afterValidate' => 'js:formSend',
                ),
                'htmlOptions'=>array('class'=>'form-horizontal'),
            )); ?>
            <div class="container row-fluid">
                <?php
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

                $this->widget('zii.widgets.CListView', array(
                    'id' => 'list_property',
                    'dataProvider'=>new CActiveDataProvider('Property', array('criteria'=>array('condition'=> $condition,'order' => 'pid DESC'),'pagination'=>array('pageSize'=>5))),
                    'itemView' => '_property_list_view',
                    'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>'
                ));
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>