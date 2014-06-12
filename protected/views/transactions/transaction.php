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
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Add Name</th>
                    <th>Add Type</th>
                    <th>Transaction Date</th>
                    <th>Amount Rs.</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Advertisement 1</td>
                    <td>Premium</td>
                    <td>3/5/2014</td>
                    <td>1500.00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Advertisement 2</td>
                    <td>Premium</td>
                    <td>2/4/2014</td>
                    <td>1500.00</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Advertisement 3</td>
                    <td>Standard</td>
                    <td>5/5/2014</td>
                    <td>1000.00</td>
                </tr>
                </tbody>
            </table>
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
