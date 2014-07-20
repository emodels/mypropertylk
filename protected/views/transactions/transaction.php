<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_transact').addClass('active');
        $('.img-prev').click(function () {
            $('#modal-img').attr('src',$(this).attr('data-href'));
            $('#myModal').modal();
        });
    });
</script>
<div class="col_right" style="padding-top: 0;">
    <div class="span12" style="border-bottom: solid 1px silver">
        <div>
            <h3>Transactions</h3>
        </div>
    </div>
    <div class="span12" style="margin-left: 0; border-bottom: solid 1px silver ">
        <div class="form_bg span">
            <div class="span2">
                <select class="btn-small" style="width: auto;">
                    <option>Sort By:</option>
                    <option>Type</option>
                    <option>Date</option>
                </select>
            </div>
            <div class="span5">
                Start Date&nbsp;<input type="date">
            </div>
            <div class="span4">
                End Date&nbsp;<input type="date">
            </div>
            <div class="span1">
                <?php echo CHtml::submitButton('Filter', array('class' => 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <div class="span12" style="margin-left: 0 ">
        <div class="container row-fluid span">
            <div class="span listing-row" style="font-weight: bold">
                <div class="span1">
                    #ID
                </div>
                <div class="span2">
                    Referenced ID
                </div>
                <div class="span2">
                    Type
                </div>
                <div class="span2">
                    Date
                </div>
                <div class="span2">
                    Amount
                </div>
                <div class="span3">
                    Status
                </div>
            </div>
            <?php
            /*$page_filter = '';
            $size_filter = '';

            if (Yii::app()->request->isAjaxRequest && isset($_GET['page'])) {

                $page_filter = ($_GET['page'] == '') ? '' : $_GET['page'] ;
                //echo $status_filter;
            }

            if (Yii::app()->request->isAjaxRequest && isset($_GET['size'])) {

                $size_filter = ($_GET['size'] == '') ? '' : $_GET['size'] ;
                //echo $status_filter;
            }*/

            if (Yii::app()->user->usertype == 0) {

                $condition = '';

            } else {

                $condition = 'user = ' . Yii::app()->user->id;
            }

            /*if ($page_filter != '') {

                if ($condition != "") {

                    $condition .= ' AND page = ' . $page_filter;
                } else {

                    $condition .= 'page = ' . $page_filter;
                }
            }

            if ($size_filter != '') {

                if ($condition != "") {

                    $condition .= ' AND size = ' . $size_filter;
                } else {

                    $condition .= 'size = ' . $size_filter;
                }

            }*/

            $this->widget('zii.widgets.CListView', array(
                'id' => 'list_transaction',
                'dataProvider'=>new CActiveDataProvider('Transactions', array('criteria'=>array('condition'=> $condition,'order' => 'transactiondate DESC'),'pagination'=>array('pageSize'=>10))),
                'itemView' => '_transaction_list_view',
                'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>'
            ));
            ?>
        </div>
    </div>
</div>
