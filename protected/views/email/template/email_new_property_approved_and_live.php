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
                    Your listing is approved by MyProperty.lk and now live on our website. You can look at your listing through the link below.
                </p>
            </td>
        </tr>
    </table>
</div>
<div style="margin-left: 10px;">
    <p><b>Property Details:</b></p>
</div>
<div style="position: relative; padding: 20px; margin-left: 10px; border: solid 1px silver; background: #f7f7f7; border-radius: 10px; font-size: 15px; width: 80%">
    <table border="0" cellpadding="2" cellspacing="2" width="100%">
        <tr>
            <td style="width: 200px"><b>Property ID:</b></td>
            <td># <?php echo $model['pid']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px"><b>Added Date</b></td>
            <td><?php echo $model['entrydate']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px"><b>Property URL</b></td>
            <td><a href="http://www.myproperty.lk/list/detail/pid/<?php echo $model['pid']; ?>" target="_blank">Click here to view Property information</a></td>
        </tr>
    </table>
</div>
</body>
</html>