<html>
<body>
<div style="position: relative; padding: 10px">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="text-align: left; border-bottom: solid 4px #002a80; padding-bottom: 15px;">
                <img class="site-logo" src="http://www.myproperty.lk/images/logo.png"/>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 15px;">
                <p>
                    Thank You for your payment ! Your Advertisement will be published ....
                </p>
            </td>
        </tr>
    </table>
</div>
<div style="margin-left: 10px;">
    <p><b>Transaction Details:</b></p>
</div>
<div style="position: relative; padding: 20px; margin-left: 10px; border: solid 1px silver; background: #f7f7f7; border-radius: 10px; font-size: 15px; width: 80%">
    <table border="0" cellpadding="2" cellspacing="2" width="100%">
        <tr>
            <td style="width: 200px"><b>Transaction ID:</b></td>
            <td># <?php echo $model['id']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px"><b>Date</b></td>
            <td><?php echo $model['transactiondate']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px"><b>Amount</b></td>
            <td> Rs. <?php echo $model['amount']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px"><b>Description</b></td>
            <td><?php echo $model['description']; ?></td>
        </tr>
    </table>
</div>
</body>
</html>