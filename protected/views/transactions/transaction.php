<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_transact').addClass('active');
        $('.img-prev').click(function () {
            $('#modal-img').attr('src',$(this).attr('data-href'));
            $('#myModal').modal();
        });
    });

    function Filter_Transactions(){

        var transactions = '';
        var start_date =  '';
        var end_date = '';

        if ($('#filter_transactions').val() != '') {
            transactions = $('#filter_transactions').val();
        }
        if ($('#start_date').val() != '') {
            start_date = $('#start_date').val();
        }
        if ($('#end_date').val() != '') {
            end_date = $('#end_date').val();
        }

        $.fn.yiiListView.update('list_transaction',{data: {'transactions': transactions,'start_date': start_date, 'end_date': end_date}});
    }
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
                <select class="btn-small" id="filter_transactions" style="width: auto;" onchange="javascript:Filter_Transactions();">
                    <option value="">Sort By:</option>
                    <option value="property">Property</option>
                    <option value="advertisement">Advertisement</option>
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
            <div class="span5">
                Start Date&nbsp;<input type="date" id="start_date">
            </div>
            <div class="span4">
                End Date&nbsp;<input type="date" id="end_date">
            </div>
            <div class="span1">
                <a href="javascript:Filter_Transactions();" class="btn btn-primary" style="margin-left: 0px;">Filter</a>
            </div>
        </div>
    </div>
    <div class="span12" style="margin-left: 0 ">
        <div class="container row-fluid span">
            <div class="span listing-row" style="font-weight: bold">
                <div class="span1">
                    #ID
                </div>
                <div class="span3">
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
                <div class="span2">
                    Status
                </div>
            </div>
            <?php
            $transaction_filter = '';
            $start_date_filter = '';
            $end_date_filter = '';

            if (Yii::app()->request->isAjaxRequest && isset($_GET['transactions'])) {

                $transaction_filter = ($_GET['transactions'] == '') ? '' : $_GET['transactions'] ;
            }

            if (Yii::app()->request->isAjaxRequest && isset($_GET['start_date'])) {

                $start_date_filter = ($_GET['start_date'] == '') ? '' : $_GET['start_date'] ;
            }

            if (Yii::app()->request->isAjaxRequest && isset($_GET['end_date'])) {

                $end_date_filter = ($_GET['end_date'] == '') ? '' : $_GET['end_date'] ;
            }

            if (Yii::app()->user->usertype == 0) {

                $condition = '';

            } else {

                $condition = 'user = ' . Yii::app()->user->id;
            }

            if ($transaction_filter != '') {

                if ($condition != "") {

                    if ($transaction_filter == "property") {

                        $condition .= ' AND type = 1';
                    } else if ($transaction_filter == "advertisement") {

                        $condition .= ' AND type = 2';
                    } else if ($transaction_filter == "completed") {

                        $condition .= ' AND status = 1';
                    } else if ($transaction_filter == "pending") {

                        $condition .= ' AND status = 0';
                    }

                } else {

                    if ($transaction_filter == "property") {

                        $condition .= ' type = ' . $transaction_filter;
                    } else if ($transaction_filter == "advertisement") {

                        $condition .= ' type = ' . $transaction_filter;
                    } else if ($transaction_filter == "completed") {

                        $condition .= ' status = 1';
                    } else if ($transaction_filter == "pending") {

                        $condition .= ' status = 0';
                    }

                }
            }
            //------------Filter by date------------//
            if ($start_date_filter != '') {

                 if ($end_date_filter != '') {

                     if ($condition != "") {

                         $condition .= ' AND transactiondate BETWEEN "' . $start_date_filter . '" AND "' . $end_date_filter . '" ';
                     } else{

                         $condition .= ' transactiondate BETWEEN "' . $start_date_filter . '" AND "' . $end_date_filter . '" ';
                     }
                 }

            }

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
