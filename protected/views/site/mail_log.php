<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid.css" type="text/css" media="all">
<script type="text/javascript">
    $(document).ready(function () {

        $('.viewMessage').click(function () {

            $('#logMessage').html($(this).next().html());
            $("#mydialog").dialog("open");
        })
    });
</script>
<div class="col_right">
    <div style="float: right">
        <h1>Mail Log for <?php echo $user->fname . ' ' . $user->lname; ?></h1>
    </div>
    <div class="clearfix"></div>
    <div class="grid-view">
        <table class="items">
            <thead>
            <tr>
                <th style="text-align: left">Email</th>
                <th style="text-align: left">Subject</th>
                <th>Message</th>
                <th>Date/Time</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'enableSorting' => false,
                'itemView' => '_mail_log_listview'
            ));
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog',
    'options'=>array(
        'title'=>'Mail Log - Message',
        'autoOpen'=>false,
        'width'=> '800',
        'height' => '600'
    ),
));
?>
<div id="logMessage" style="padding: 20px"></div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
