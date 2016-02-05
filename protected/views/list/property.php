<script type="text/javascript">
    $(document).ready(function(){
       
       $('#lnk_list li').each(function(){
          $(this).removeClass('active'); 
       });
       
       <?php if (isset($_GET['type']) && $_GET['type'] == 'buy') { ?>
           $('#lnk_buy').addClass('active');
       <?php } if (isset($_GET['type']) && $_GET['type'] == 'rent') { ?>
           $('#lnk_rent').addClass('active');
       <?php } ?>
    });
</script>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tooltipster.css" />
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.min.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel.min.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flexslider.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.placeholder.js'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var slide = {"start":"1","interval":"5000"};
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/real-expert.js'></script>
<script type="text/javascript" src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.maphilight.min.js'></script>
<script type="text/javascript" src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tooltipster.min.js'></script>
<script type="text/javascript" src='<?php echo Yii::app()->request->baseUrl; ?>/js/typeahead.bundle.min.js'></script>
<!-- Start sider HEAD section -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/engine1/style.css" />
<!-- End slider HEAD section -->
<script type="text/javascript">
    jQuery(document).ready(function () {

        jQuery.fn.maphilight.defaults = {
            fill: true,
            fillColor: '104745',
            fillOpacity: 1,
            stroke: true,
            strokeColor: 'B6EEEB',
            strokeOpacity: 1,
            strokeWidth: 1,
            fade: true,
            alwaysOn: false,
            neverOn: false,
            groupBy: false,
            wrapClass: true,
            shadow: false,
            shadowX: 0,
            shadowY: 0,
            shadowRadius: 6,
            shadowColor: '000000',
            shadowOpacity: 0.8,
            shadowPosition: 'outside',
            shadowFrom: false
        }
        jQuery('#map-imagemap').maphilight();
        jQuery('.tooltip').tooltipster();

        $('#headline_wrapper').hide();

        if ('<?php echo $_GET['type']; ?>' == 'buy') {
            $('#menu-primary-menu li').removeClass('current_page_item');
            $('#menu-primary-menu li#buy').addClass('current_page_item');
        }

        if ('<?php echo $_GET['type']?>' == 'rent') {
            $('#menu-primary-menu li').removeClass('current_page_item');
            $('#menu-primary-menu li#rent').addClass('current_page_item');
        }

        if ('<?php echo $_GET['type']?>' == 'sold') {
            $('#menu-primary-menu li').removeClass('current_page_item');
            $('#menu-primary-menu li#sold').addClass('current_page_item');
        }

        var array_cities = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,

            <?php if (isset($_GET['district'])) { ?>
                remote: { url: '<?php echo Yii::app()->request->baseUrl; ?>/list/searchjson/query/%QUERY/district/<?php echo $_GET['district']; ?>', filter: function(list) { return $.map(list, function(city) { return { name: city }; }); } }
            <?php } else { ?>
                remote: { url: '<?php echo Yii::app()->request->baseUrl; ?>/list/searchjson/query/%QUERY', filter: function(list) { return $.map(list, function(city) { return { name: city }; }); } }
            <?php } ?>
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
        var redirURL = '<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/<?php echo $_GET['type']; ?>';

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
            redirURL += '/district/' + district;
        }

        $.ajax({
            type: "POST",
            url: '<?php echo Yii::app()->request->baseUrl; ?>/list/searchjson',
            data: $.param(array_search),
            success: function(data){
                if (data == 'done'){
                    window.document.location.replace(redirURL);
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
                    $.fn.yiiListView.update('list_property');
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

        $.fn.yiiListView.update('list_property',{data: {'sort': sort}});
    }

</script>
<style type="text/css">

    .status-28-text{
        background-color : #ba121b;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-top: solid 1px #fff;
    }
    .status-28{
        border-bottom:5px solid #ba121b !important;
    }

    .status-35-text{
        background-color : #0a0b83;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-top: solid 1px #fff;
    }

    .status-35{
        border-bottom:5px solid #0a0b83 !important;
    }

    div.form label {
        font-size: 11px;;
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

    #footer_main{
        margin-top:150px;
}
</style>
<div class="content-wrapper clearfix">
    <div class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'addproperty1-form',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'afterValidate' => 'js:formSend',
            ),
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
            <div class="container">
                <div class="row-fluid">
                    <div class="span9 content_buy">
                        <div class="row-fluid">
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
                                             <div class="span12" style="margin-left: 0; width:255px">
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
                                                 <a href="javascript:SearchProperty(<?php if(isset($_GET['district'])){ echo $_GET['district']; };?>);" class="btn btn-primary">Update</a>
                                             </div>
                                             <div class="span6 text-right">
                                                 <a href="javascript:Refine_Search();" class="span8" style="font-size: 12px;" type="reset">clear all</a>
                                             </div>
                                         </div>
                                     <?php $this->endWidget(); ?>
                                     </div>
                                    <div calss="span12">
                                        <div class="row-fluid  hidden-phone">
                                            <?php

                                            if ($_GET['type'] == "buy") {

                                                $page = 2;
                                            } elseif ($_GET['type'] == "rent"){

                                                $page = 3;
                                            } elseif ($_GET['type'] == "sold"){

                                                $page = 4;
                                            }

                                            $condition = '(t.page = ' . $page . ' AND (t.size = 1 OR t.size = 3 OR t.size = 5) AND t.status = 1) AND t.expiredate >= CURDATE()';

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
                            <div class="span8">
                                <div class="row-fluid">
                                    <div id="title-listing" class="container-fluid">
                                        <div class="property-list-title" style="text-align: center">
                                            <?php

                                            if (isset($_GET['type'])) {

                                                if ($_GET['type'] == "buy") {

                                                    if (isset($_GET['district'])) {

                                                        $district =  District::model()->findByPk($_GET['district']);
                                                        echo "Properties for Sale in " . $district->name;

                                                    } else if (isset($_SESSION['search']['town'])){

                                                        echo "Properties for Sale in " . $_SESSION['search']['town'];

                                                    } else {

                                                        echo "Properties for Sale";
                                                    }

                                                } elseif ($_GET['type'] == "rent") {

                                                    if (isset($_SESSION['search']['district'])) {

                                                        $district =  District::model()->findByPk($_SESSION['search']['district']);
                                                        echo "Properties for Rent in " . $district->name;

                                                    } else if (isset($_SESSION['search']['town'])){

                                                        echo "Properties for Sale in " . $_SESSION['search']['town'];

                                                    } else {

                                                        echo "Properties for Rent";
                                                    }

                                                } elseif ($_GET['type'] == "sold") {

                                                    if (isset($_SESSION['search']['district'])) {

                                                        $district =  District::model()->findByPk($_SESSION['search']['district']);
                                                        echo "Properties for Sold in " . $district->name;

                                                    } else if (isset($_SESSION['search']['town'])){

                                                        echo "Properties for Sale in " . $_SESSION['search']['town'];

                                                    } else {

                                                        echo "Properties for Sold";
                                                    }

                                                }

                                            }

                                            ?>

                                        </div>
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
                                    <?php
                                    $criteria = new CDbCriteria();

                                    if($_GET['type'] == "buy"){

                                        $criteria->compare('type',1,false);
                                        $criteria->compare('type',2,false,'OR');
                                        $criteria->compare('status',1,false,'AND');

                                    } elseif($_GET['type'] == "rent"){

                                        $criteria->compare('type',3,false);
                                        $criteria->compare('status',1,false,'AND');

                                    } elseif($_GET['type'] == "sold"){

                                        $criteria->addCondition('type = 1 OR type = 2 OR type = 3');
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

                                    $criteria->order = 'pricetype DESC, entrydate DESC'; /*---( Default Sort Order )---*/

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

                                    /*---( Get Page Type )---*/
                                    if ($_GET['type'] == "buy") {

                                        $page = 2;
                                    } elseif ($_GET['type'] == "rent"){

                                        $page = 3;
                                    } elseif ($_GET['type'] == "sold"){

                                        $page = 4;
                                    }

                                    /*---( Middle Advertisements )---*/
                                    $condition_middle_ads = '(page = ' . $page . ' AND (size = 7) AND status = 1) AND expiredate >= CURDATE()';

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
                                        'id' => 'list_property',
                                        'dataProvider'=>$dataprovider,
                                        'itemView' => '_list_view',
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
                        <style type="text/css">
                            .list-view .summary {
                                display: none;
                            }

                            .list-view .empty {
                                display: none;
                            }
                        </style>
                        <?php
                        $condition = '(t.page = ' . $page . ' AND (t.size = 2 OR t.size = 4 OR t.size = 6) AND t.status = 1) AND t.expiredate >= CURDATE()';

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
        <?php $this->endWidget(); ?>
    </div>
</div><!-- /.content-wrapper -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/engine1/wowslider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/engine1/script.js"></script>