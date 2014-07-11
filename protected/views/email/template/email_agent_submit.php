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
                    You have received a new lead from <a href="http://www.myproperty.lk">myproperty.lk</a> for:
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <?php

                 $propertyList = Property::model()->findByPk($model['pid']);

                ?>
                <p><b>Property ID: #</b> <?php echo  $propertyList->pid; ?></p>

                <?php
                $address = "";

                if ($propertyList->number != "") {

                    $address .= $propertyList->number . ", ";
                }

                if ($propertyList->streetaddress != "") {

                    $address .= $propertyList->streetaddress . ", ";
                }

                if ($propertyList->areaname != ""){

                    $address .= $propertyList->areaname . ", ";
                }

                if ($propertyList->townname != "") {

                    $address .= $propertyList->townname;
                }

                ?>
                <p><b>Property Address :</b> <?php echo ucwords($address); ?></p>

                <p><b>Property URL :</b> <a href="http://www.myproperty.lk/list/detail/pid/<?php echo $propertyList->pid; ?>" target="_blank">www.myproperty.lk/list/detail/pid/<?php echo  $propertyList->pid; ?></a> </p>
            </td>
        </tr>
    </table>
</div>
<div style="margin-left: 10px;">
    <p><b>User Details:</b></p>
</div>
<div style="position: relative; padding: 20px; margin-left: 10px; border: solid 1px silver; background: #f7f7f7; border-radius: 10px; font-size: 15px; width: 80%">
    <table border="0" cellpadding="2" cellspacing="2" width="100%">
        <tr>
            <td style="width: 200px"><b>Name</b></td>
            <td><?php echo $model['name']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px"><b>Email</b></td>
            <td><?php echo $model['email']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px"><b>Phone</b></td>
            <td><?php echo $model['phone']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px"><b>About Me</b></td>
            <td>
                <?php

                switch ($model['about_me']) {
                    case 0:
                        echo "I own my own home";
                        break;
                    case 1:
                        echo "I am renting";
                        break;
                    case 2:
                        echo "I have recently sold";
                        break;
                    case 3:
                        echo "I am a first home buyer";
                        break;
                    case 4:
                        echo "I am looking to invest";
                        break;
                    case 5:
                        echo "I am monitoring the market";
                        break;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 200px"><b>I would like to</b></td>
            <td>
                <?php
                if ($model['get_price'] == 1) {
                    echo "Get an indication of price". '<br/>';
                }
                if ($model['sale_contract'] == 1) {
                    echo "Obtain the contract of sale". '<br/>';
                }
                if ($model['inspect_property'] == 1) {
                    echo "Inspect the property". '<br/>';
                }
                if ($model['simillar_properties'] == 1) {
                    echo "Be contacted about similar properties". '<br/>';
                }
                ?>
            </td>
        </tr>

        <tr>
            <td style="width: 200px"><b>Comments</b></td>
            <td><?php echo $model['comment']; ?></td>
        </tr>
    </table>
</div>
</body>
</html>