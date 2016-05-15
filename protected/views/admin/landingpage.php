<script type="text/javascript">

    function confirmDelete(id) {

        if (confirm('Are you sure to delete this Landing page ?')) {

            window.location.href = "<?php echo Yii::app()->request->baseUrl .'/admin/landingpages/action/delete/id/'; ?>" + id;
        }
    }
</script>
<div class="col_right" style="padding-top: 0; min-height: 400px">
    <div class="span12" style="border-bottom: solid 1px silver">
        <div class="span7">
            <h3>Landing Pages</h3>
        </div>
        <div class="span5 text-right" style="margin-top: 20px">
                <button class="btn btn-primary"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/addlandingpage" style="text-decoration: none; color: #ffffff">Add New Landing Page</a></button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="span12">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'landingpages-form',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
            ),
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
        <div class="container-fluid" style="padding: 0;">
            <div class="span listing-row" style="font-weight: bold">
                <div class="span1">
                    #ID
                </div>
                <div class="span3">
                    Title
                </div>
                <div class="span4">
                    Desc
                </div>
                <div class="span4">
                    &nbsp;
                </div>
            </div>
            <?php
            /*$this->widget('zii.widgets.CListView', array(
                'id' => 'landing_pages',
                'dataProvider'=>new CActiveDataProvider('landingpage', array('criteria'=>array('order' => 'id DESC'),'pagination'=>array('pageSize'=>10))),
                'itemView' => '_landing_pages_list_view',
                'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>',
                'afterAjaxUpdate'=>'function(id,options){window.scroll(0,0);}',
            ));*/
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>