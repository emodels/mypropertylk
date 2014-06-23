<div class="col_right">
    <div class="span-10">
        <p>Welcome back, what would you like to do?</p>
    </div>
    <div class="span1">
        <div class="control-group">
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    New
                    <span class="caret"></span>
                </a>
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
    <div class="span1">
        <div class="control-group">
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    View
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=1">Home Sales</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=2">Land Sales</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=3">Home Rental</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=4">Home Ideas</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=5">Commercial</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="span9" style="text-align: right">
        <div class="control-group">
            <form class="form-search">
                <div class="input-append">
                    <input type="text" class="span7 search-query hidden-phone"  placeholder="Input Propertry ID">
                    <input type="text" class="span1 search-query visible-phone"  placeholder="Input Propertry ID">
                    <button type="submit" class="btn"><i class="icon-search"></i>&nbsp;Find</button>
                </div>
            </form>
        </div>
    </div>
    <div class="span10 hidden-phone" style="text-align: center;">
        <?php if ($model->parentuser > 0) {?>
            <div>
                <img src="<?php echo Yii::app()->request->baseUrl. '/upload/userimages/' . $parent->userimage ;?> " style="width: 90px; height: 100px; border: solid 1px silver; padding: 3px;">
                <h2>You are a member of <?php echo ucwords($parent->fname); ?></h2>
            </div>
        <?php } else {?>
        <div>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/editing-icon.png" style="width: 200px; height: 200px;">
        </div>
        <?php }?>
        <div>
            <h4>You are in "Agent Control" mode</h4>
            <h4>The easy way to manage your listings and much more!</h4>
        </div>
    </div>
</div>

