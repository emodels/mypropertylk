<script type="text/javascript">
    $(document).ready(function(){
       
       $('#lnk_list li').each(function(){
          $(this).removeClass('active'); 
       });
       $('#id="lnk_commercial"').addClass('active');
    });
</script>

<script type="text/javascript" src='<?php echo Yii::app()->request->baseUrl; ?>/js/typeahead.bundle.min.js'></script>
<!-- Start sider HEAD section -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/engine1/style.css" />
<!-- End slider HEAD section -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#menu-primary-menu li').removeClass('current_page_item');
        $('#menu-primary-menu li#commercial').addClass('current_page_item');

        if (<?php echo $_GET['type']?> == all) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#all').addClass('active');
        } else if (<?php echo $_GET['type']?> == sale) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#sale').addClass('active');
        } else if (<?php echo $_GET['type']?> == lease) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#lease').addClass('active');
        } else if (<?php echo $_GET['type']?> == sold) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#sold').addClass('active');
        }

        $('#headline_wrapper').hide();

        var array_cities = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: { url: '<?php echo Yii::app()->request->baseUrl; ?>/list/searchjson/query/%QUERY', filter: function(list) { return $.map(list, function(city) { return { name: city }; }); } }
        });

        array_cities.initialize();

        $('#townname').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },
            {
                name: 'city-list',
                displayKey: 'name',
                source: array_cities.ttAdapter()
            });

    });

    function Refine_Search(){
        $('#min_price').val(0).selectpicker('render');
        $('#max_price').val(0).selectpicker('render');
        $('#min_bed').val(0).selectpicker('render');
        $('#max_bed').val(0).selectpicker('render');
        $('#bathrooms').val(0).selectpicker('render');
        $('#carspaces').val(0).selectpicker('render');
        $('#landsize').val('');
        $('#condition').val(0).selectpicker('render');
        $('#prop_type').val(0).selectpicker('render');
        $('#pricetype_0').removeAttr('checked');
    }

    function SearchProperty(district){

        var array_search = [];

        array_search.push({name: 'search[type]', value: '<?php echo $_GET['type']; ?>'});
        array_search.push({name: 'search[town]', value: $("#townname").val()});
        array_search.push({name: 'search[category]', value: $("#prop_type").val()});
        array_search.push({name: 'search[minbed]', value: $("#min_bed").val()});
        array_search.push({name: 'search[maxbed]', value: $("#max_bed").val()});
        array_search.push({name: 'search[minprice]', value: $("#min_price").val()});
        array_search.push({name: 'search[maxprice]', value: $("#max_price").val()});
        array_search.push({name: 'search[bathrooms]', value: $("#bathrooms").val()});
        array_search.push({name: 'search[carspaces]', value: $("#carspaces").val()});
        array_search.push({name: 'search[landsize]', value: $("#landsize").val()});
        array_search.push({name: 'search[condition]', value: $("#condition").val()});
        array_search.push({name: 'search[premiere]', value: $("#pricetype_0").is(':checked')});

        if (district != null) {
            array_search.push({name: 'search[district]', value: district});
        }

        $.ajax({
            type: "POST",
            url: '<?php echo Yii::app()->request->baseUrl; ?>/list/searchjson',
            data: $.param(array_search),
            success: function(data){
                if (data == 'done'){
                    window.document.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/<?php echo $_GET['type']; ?>');
                }
            }
        });
    }

    //-----------Save Property to watch list-------------//
    function SaveProperty(id){

        $.ajax({
            type: "GET",
            url: '<?php echo Yii::app()->request->baseUrl; ?>/profile/watchlist/mode/SAVE/id/' + id,
            success: function(data){

                if (data == 'redirect'){
                    window.document.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/login');
                }

                if (data == 'done'){
                    $.fn.yiiListView.update('list_commercial');
                }
            }
        });

        return false;
    }

    //--------------Sort Property-------//
    function Filter_Property(){

        var sort = '';

        if ($('#filter_sort').val() != '') {
            sort = $('#filter_sort').val();
        }

        $.fn.yiiListView.update('list_commercial',{data: {'sort': sort}});
    }
</script>
<style>
    .nav-tabs {
        border-bottom: 1px solid #fcb30f;
    }
    .nav-tabs a{
        color: #131326;
        background-color:  #f7f7f9;
        border: 1px solid #fcb30f !important;
        border-bottom-color: #fcb30f;
    }
    .nav-tabs > .active > a,
    .nav-tabs > .active > a:focus {
        color: #fff;
        background-color: #FFB013;
        border: 1px solid #fcb30f !important;
        border-bottom-color: #fcb30f!important;
    }
    .nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
        color: #fff;
        background-color: #FFB013;
        border: 1px solid #fcb30f !important;
        border-bottom-color: #fcb30f!important;
    }

    div.form label {
        font-size: 11px;;
    }

    .list-view .summary {
        display: none;
    }

    .list-view .empty {
        display: none;
    }

    .twitter-typeahead{
        display: block !important;
    }

    .tt-dropdown-menu,
    .gist {
        text-align: left;
    }

    .typeahead,
    .tt-query,
    .tt-hint {
        width: 228px;
        height: 30px;
        padding: 8px 12px;
        font-size: 12px;
        line-height: 20px;
        border: 2px solid #ccc;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        outline: none;
    }

    .typeahead {
        background-color: #fff;
    }

    .typeahead:focus {
        border: 2px solid #0097cf;
    }

    .tt-query {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }

    .tt-hint {
        color: #999;
    }

    .tt-dropdown-menu {
        width: 228px;
        margin-top: 12px;
        padding: 8px 0;
        background-color: #fff;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
    }

    .tt-suggestion {
        padding: 3px 20px;
        font-size: 12px;
        line-height: 18px;
    }

    .tt-suggestion.tt-cursor {
        color: #fff;
        background-color: #0097cf;

    }

    .tt-suggestion p {
        margin: 0;
    }

    .gist {
        font-size: 14px;
    }
</style>
<div class="content-wrapper clearfix">
    <div class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'commercial-form',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'afterValidate' => 'js:formSend',
            ),
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
        <div class="container" >
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <div class="span9 content_buy">
                            <div class="container row-fluid">
                            <div class="span4">
                            <div class="row-fluid">
                            <div class="form">
                            <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'refinrsearch',
                                'enableClientValidation'=>true,
                                'enableAjaxValidation' => false,
                                'clientOptions'=>array(
                                    'validateOnSubmit'=>true,
                                    'validateOnChange'=>true,
                                ),
                                'htmlOptions'=>array('class'=>'form-horizontal')
                            )); ?>
                            <div id="title-listing" class="container">
                                <div class="property-list-title" style="font-size: 18px; color: #ff0000">Refine Search By:</div>
                            </div>
                            <div class="span12" style="margin-bottom: 10px;">
                                <label>Location</label>
                                <div class="span12" style="margin-left: 0;">
                                    <?php echo $form->textField($model,'townname', array('placeholder'=>'e.g: Colombo; Anuradhapura; ', 'class' => 'span10 typeahead', 'id' => 'townname', 'style' => 'z-index: 2')); ?>
                                </div>
                            </div>
                            <div class="span12">
                                <?php
                                $this->widget('ext.bootstrap-select.TbSelect',array(
                                    'model' => $modeltype,
                                    'attribute' => 'typeid',
                                    'data' => CHtml::listData(Propertytype::model()->findAll(),'id','proptype'),
                                    'htmlOptions' => array(
                                        'multiple' => true,
                                        'multiple title'=> 'Property Type',
                                        'class' => 'span10',
                                        'id' => 'prop_type'
                                    ),
                                )); ?>
                                <?php echo $form->error($modeltype, 'typeid'); ?>

                            </div>
                            <div class="span12" style="margin-top: 10px; margin-bottom: 10px">
                                <label>Min. Land</label>
                                <div class="span11"  style="margin-left: 0;">
                                    <?php echo $form->textField($model,'landsize', array('placeholder'=>'Min Size', 'class' => 'span11', 'id' => 'landsize', 'value' => $array_searchpara->landsize)); ?>
                                </div>
                            </div>
                            <div class="span12">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <label>Min. Price</label>
                                        <?php
                                        $array_minprice= array(0 => 'Any',
                                            '50,000' => '50,000',
                                            '100,000' => '100,000',
                                            '150,000' => '150,000',
                                            '200,000' => '200,000',
                                            '250,000' => '250,000',
                                            '300,000' => '300,000',
                                            '350,000' => '350,000',
                                            '400,000' => '400,000',
                                            '450,000' => '450,000',
                                            '500,000' => '500,000',
                                            '550,000' => '550,000',
                                            '600,000' => '600,000',
                                            '650,000' => '650,000',
                                            '700,000' => '700,000',
                                            '750,000' => '750,000',
                                            '800,000' => '800,000',
                                            '8500,000' => '8500,000',
                                            '900,000' => '900,000',
                                            '950,000' => '950,000',
                                            '1,000,000' => '1,000,000',
                                            '1,250,000' => '1,250,000',
                                            '1,500,000' => '1,500,000',
                                            '1,750,000' => '1,750,000',
                                            '2,000,000' => '2,000,000',
                                            '2,500,000' => '2,500,000',
                                            '3,000,000' => '3,000,000',
                                            '4,000,000' => '4,000,000',);
                                        ?>
                                        <?php $this->widget('ext.bootstrap-select.TbSelect',array(
                                            'name' => 'min_price',
                                            'value' => $array_searchpara->minprice,
                                            'data' => $array_minprice,
                                            'htmlOptions'=> array('id' => 'min_price','class'=>'span8')
                                        )); ?>
                                    </div>
                                    <div class="span6">
                                        <label>Max. Price</label>
                                        <?php
                                        $array_maxprice= array(0 => 'Any',
                                            '50,000' => '50,000',
                                            '100,000' => '100,000',
                                            '150,000' => '150,000',
                                            '200,000' => '200,000',
                                            '250,000' => '250,000',
                                            '300,000' => '300,000',
                                            '350,000' => '350,000',
                                            '400,000' => '400,000',
                                            '450,000' => '450,000',
                                            '500,000' => '500,000',
                                            '550,000' => '550,000',
                                            '600,000' => '600,000',
                                            '650,000' => '650,000',
                                            '700,000' => '700,000',
                                            '750,000' => '750,000',
                                            '800,000' => '800,000',
                                            '8500,000' => '8500,000',
                                            '900,000' => '900,000',
                                            '950,000' => '950,000',
                                            '1,000,000' => '1,000,000',
                                            '1,250,000' => '1,250,000',
                                            '1,500,000' => '1,500,000',
                                            '1,750,000' => '1,750,000',
                                            '2,000,000' => '2,000,000',
                                            '2,500,000' => '2,500,000',
                                            '3,000,000' => '3,000,000',
                                            '4,000,000' => '4,000,000',);
                                        ?>
                                        <?php $this->widget('ext.bootstrap-select.TbSelect',array(
                                            'name' => 'max_price',
                                            'value' => $array_searchpara->maxprice,
                                            'data' => $array_maxprice,
                                            'htmlOptions'=> array('id' => 'max_price','class'=>'span8')
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="span12" style="padding-top: 10px;">
                                <div class="span6">
                                    <label>Min. Beds</label>
                                    <?php
                                    $array_minbedrooms= array(0 => 'Any',
                                        1 => '1',
                                        2 => '2',
                                        3 => '3',
                                        4 => '4',
                                        5 => '5',
                                        6 => '6',
                                        7 => '7',
                                        8 => '8',
                                        9 => '9',
                                        10 => '10');
                                    ?>
                                    <?php $this->widget('ext.bootstrap-select.TbSelect',array(
                                        'name' => 'min_beds',
                                        'value' => $array_searchpara->minbed,
                                        'data' => $array_minbedrooms,
                                        'htmlOptions'=> array('id' => 'min_bed','class'=>'span8')
                                    )); ?>
                                </div>
                                <div class="span6">
                                    <label>Max. Beds</label>
                                    <?php
                                    $array_maxbedrooms= array(0 => 'Any',
                                        1 => '1',
                                        2 => '2',
                                        3 => '3',
                                        4 => '4',
                                        5 => '5',
                                        6 => '6',
                                        7 => '7',
                                        8 => '8',
                                        9 => '9',
                                        10 => '10');
                                    ?>
                                    <?php $this->widget('ext.bootstrap-select.TbSelect',array(
                                        'name' => 'max_beds',
                                        'value' => $array_searchpara->maxbed,
                                        'data' => $array_maxbedrooms,
                                        'htmlOptions'=> array('id' => 'max_bed','class'=>'span8')
                                    )); ?>
                                </div>

                            </div>
                            <div class="span12" style="padding-top: 10px;">
                                <div class="span6">
                                    <label>Bathrooms</label>
                                    <?php
                                    $array_bathrooms= array(0 => 'Any',
                                        1 => '1+',
                                        2 => '2+',
                                        3 => '3+',
                                        4 => '4+',
                                        5 => '5+');
                                    ?>
                                    <?php $this->widget('ext.bootstrap-select.TbSelect',array(
                                        'name' => 'bathrooms',
                                        'value' => $array_searchpara->bathrooms,
                                        'data' => $array_bathrooms,
                                        'htmlOptions'=> array('id' => 'bathrooms','class'=>'span8')
                                    )); ?>
                                </div>
                                <div class="span6">
                                    <label>Car Spaces</label>
                                    <?php
                                    $array_carspaces= array(0 => 'Any',
                                        1 => '1+',
                                        2 => '2+',
                                        3 => '3+',
                                        4 => '4+',
                                        5 => '5+');
                                    ?>
                                    <?php $this->widget('ext.bootstrap-select.TbSelect',array(
                                        'name' => 'carspaces',
                                        'value' => $array_searchpara->carspaces,
                                        'data' => $array_carspaces,
                                        'htmlOptions'=> array('id' => 'carspaces','class'=>'span8')
                                    )); ?>
                                </div>
                            </div>
                            <div class="span12" style="padding-top: 10px;">
                                <label>New or Established</label>
                                <?php
                                $array_condition= array(0 => 'Any',
                                    1 => 'New Construction',
                                    2 => 'Established Property');
                                ?>
                                <?php $this->widget('ext.bootstrap-select.TbSelect',array(
                                    'name' => 'condition',
                                    'value' => $array_searchpara->condition,
                                    'data' => $array_condition,
                                    'htmlOptions'=> array(
                                        'id' => 'condition',
                                        'class' => 'span10'
                                    )
                                )); ?>
                            </div>
                            <div class="span12" style="padding-top: 10px;">
                                <label class="checkbox">
                                    <?php
                                    if($array_searchpara->premiere == 'true'){
                                        $value = true;
                                    } else {
                                        $value = false;
                                    }

                                    echo CHtml::checkBoxList('pricetype', $value, array(1 => 'Search only Premiere Properties'), array('labelOptions'=> array('class'=>'span9')));
                                    ?>
                                </label>
                            </div>
                            <div class="span12" style="padding: 10px 0;">
                                <div class="span6">
                                    <a href="javascript:SearchProperty();" class="btn btn-primary">Update</a>
                                </div>
                                <div class="span6 text-right">
                                    <a href="javascript:Refine_Search();" class="span8" style="font-size: 12px;" type="reset">clear all</a>
                                </div>
                            </div>
                            <?php $this->endWidget(); ?>
                            </div>

                            </div>
                            </div>
                                <div class="span8">
                                    <div id="title-listing">
                                        <div class="property-list-title">Commercial Properties</div>
                                    </div>
                                    <div class="span12" style="padding: 5px 5px; margin-left:0; margin-bottom: 10px; text-align: right; background-color: #ececec; border-radius: 15px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;  border: solid 1px silver; border-bottom: dotted 1px #000;">
                                        <label style="display: inline">Sorted By : </label>
                                        <select class="btn-small" style="width: auto;" id="filter_sort" onchange="javascript:Filter_Property();">
                                            <option value="">Sort Properties</option>
                                            <option value="entrydate">Date</option>
                                            <option value="district">District</option>
                                            <option value="pricetype">Property Type</option>
                                            <option value="price">Price</option>
                                            <option value="agent">Agent</option>
                                        </select>
                                    </div>
                                    <div>
                                        <ul class="nav nav-tabs">
                                            <li id="all" class="active">
                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/all">All</a>
                                            </li>
                                            <li id="sale"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/sale">For Sale</a></li>
                                            <li id="lease"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/lease">For Lease</a></li>
                                            <li id="sold"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/sold">Sold / Leased</a></li>
                                        </ul>
                                    </div>
                                    <div class="row-fluid">
                                        <?php

                                        $criteria = new CDbCriteria();

                                        if($_GET['type'] == "all"){

                                            $criteria->compare('type',4,false);
                                            $criteria->compare('type',5,false,'OR');
                                            $criteria->compare('status',1,false,'AND');

                                        } elseif($_GET['type'] == "sale"){

                                            $criteria->compare('type',4,false);
                                            $criteria->compare('status',1,false,'AND');

                                        } elseif($_GET['type'] == "lease"){

                                            $criteria->compare('type',5,false);
                                            $criteria->compare('status',1,false,'AND');

                                        } elseif($_GET['type'] == "sold"){

                                            $criteria->addCondition('type = 4 OR type = 5');
                                            $criteria->compare('status',2,false,'AND');

                                        }

                                        if ($array_searchpara->town != "") {
                                            $criteria->compare('townname',$array_searchpara->town,true,'AND',true);
                                        }


                                        if ($array_searchpara->category != "") {

                                            $criteria->with = array('propertytyperelations');
                                            $criteria->together = true;

                                            $criteria->addCondition('propertytyperelations.typeid IN (' . $array_searchpara->category . ')');
                                        }

                                        if ($array_searchpara->minbed > 0  ) {
                                            $criteria->addCondition('bedrooms >= ' . $array_searchpara->minbed);
                                        }

                                        if ($array_searchpara->maxbed > 0  ) {
                                            $criteria->addCondition('bedrooms >0 AND bedrooms <= ' . $array_searchpara->maxbed);
                                        }

                                        if ($array_searchpara->minprice > 0  ) {

                                            $minprice = str_replace(',', '', $array_searchpara->minprice);
                                            $criteria->addCondition('price >= ' . (double)$minprice);
                                        }

                                        if ($array_searchpara->maxprice > 0  ) {

                                            $maxprice = str_replace(',', '', $array_searchpara->maxprice);
                                            $criteria->addCondition('price > 0 AND price <= ' . (double)$maxprice);
                                        }

                                        if ($array_searchpara->district > 0) {

                                            $criteria->addCondition('district = ' . $array_searchpara->district);
                                        }

                                        if ($array_searchpara->bathrooms > 0  ) {
                                            $criteria->addCondition('bathrooms >= ' . $array_searchpara->bathrooms);
                                        }

                                        if ($array_searchpara->carspaces > 0  ) {
                                            $criteria->addCondition('parkingspaces >= ' . $array_searchpara->carspaces);
                                        }

                                        if ($array_searchpara->landsize > 0  ) {

                                            $criteria->addCondition('landsize >= ' . $array_searchpara->landsize);
                                        }

                                        if ($array_searchpara->condition > 0  ) {

                                            $criteria->addCondition('propcondition >= ' . $array_searchpara->condition);
                                        }

                                        if ($array_searchpara->premiere == 'true') {

                                            $criteria->addCondition('pricetype = 2');
                                        }

                                        $criteria->order = 'pricetype DESC, entrydate DESC';

                                        /*---( Override Sort Order based on selected filter )---*/
                                        if (Yii::app()->request->isAjaxRequest && isset($_GET['sort']) && $_GET['sort'] != '') {

                                            $criteria->order = $_GET['sort'];
                                        }

                                        $dataprovider = new CActiveDataProvider('Property', array('criteria'=> $criteria ,'pagination'=>array('pageSize'=>15)));

                                        if ($dataprovider->totalItemCount == 0) {

                                            echo '<div class="alert alert-danger" style="font-size: 16px;">';
                                            echo "No Property found....!";
                                            echo '</div>';
                                        }

                                        /*---( Middle Advertisements )---*/
                                        $condition_middle_ads = '(page = 5 AND (size = 8) AND status = 1) AND expiredate >= CURDATE()';

                                        $array_advertisements_used = array();
                                        $array_advertisements_all = Advertising::model()->findAll(array('condition'=> $condition_middle_ads,'order' => 'entrydate DESC'));

                                        Yii::app()->session['utilized_middle_advertisements'] = $array_advertisements_used;

                                        function loadMiddleAdvertisement($adv_All){

                                            $adv_used = Yii::app()->session['utilized_middle_advertisements'];

                                            $nextAdvID = 0;

                                            foreach ($adv_All as $value) {

                                                if (!in_array($value->id, $adv_used)) {

                                                    $adv_used[] = $value->id;
                                                    $nextAdvID = $value->id;

                                                    Yii::app()->session['utilized_middle_advertisements'] = $adv_used;

                                                    break;
                                                }
                                            }

                                            if ($nextAdvID > 0) {

                                                $next_Advertisement = Advertising::model()->findByPk($nextAdvID);
                                                return Yii::app()->controller->renderPartial('_ads_list_view', array('data'=>$next_Advertisement), true);

                                            } else {

                                                return '';
                                            }
                                        }
                                        /*---( //end of Middle Advertisements )---*/

                                        $this->widget('zii.widgets.CListView', array(
                                            'id' => 'list_commercial',
                                            'dataProvider'=>$dataprovider,
                                            'itemView' => '_commercial_list_view',
                                            'viewData' => array('adv_All' => $array_advertisements_all),
                                            'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>',
                                            'afterAjaxUpdate'=>'function(id, data){ renderPropertySlidersAfetrPagination(); window.scroll(0,0); }',
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Advertiesments--->
                        <div class="span3 hidden-phone">
                            <div class="row-fluid">
                                <?php
                                $condition = '(t.page = 5 AND (t.size = 2 OR t.size = 4 OR t.size = 6) AND t.status = 1) AND t.expiredate >= CURDATE()';

                                $with = array('size0'=>array('condition'=>'size0.id = t.size'));

                                $this->widget('zii.widgets.CListView', array(
                                    'id' => 'list_advertisement',
                                    'dataProvider'=>new CActiveDataProvider('Advertising', array('criteria'=>array('condition' => $condition, 'with' => $with, 'order' => 'size0.height DESC', 'together'=>true),'pagination'=>false)),
                                    'itemView' => '_ads_list_view'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div><!-- /.content-wrapper -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/engine1/wowslider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/engine1/script.js"></script>
