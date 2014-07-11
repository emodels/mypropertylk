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

        $('#ikman_map area').click(function (event) {
            event.preventDefault();
            SearchProperty($(this).attr('href').replace('#',''));
            return false;
        });

        var array_cities = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: { url: 'list/searchjson/query/%QUERY', filter: function(list) { return $.map(list, function(city) { return { name: city }; }); } }
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

    function LoadFeaturedList(type) {
        $.fn.yiiListView.update('list_featured', {data:{type: type}});
    }

    function SearchProperty(district){

        var array_search = [];

        array_search.push({name: 'search[type]', value: $("input[name='Property[type]']:checked").val()});
        array_search.push({name: 'search[town]', value: $("#townname").val()});
        array_search.push({name: 'search[category]', value: $("#prop_type").val()});
        array_search.push({name: 'search[minbed]', value: $("#min_bed").val()});
        array_search.push({name: 'search[maxbed]', value: $("#max_bed").val()});
        array_search.push({name: 'search[minprice]', value: $("#min_price").val()});
        array_search.push({name: 'search[maxprice]', value: $("#max_price").val()});

        if (district != null) {
            array_search.push({name: 'search[district]', value: district});
        }

        $.ajax({
            type: "POST",
            url: '<?php echo Yii::app()->request->baseUrl; ?>/list/searchjson',
            data: $.param(array_search),
            success: function(data){
                if (data == 'done'){
                    window.document.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/' + $("input[name='Property[type]']:checked").val());
                }
            }
        });
    }

</script>
<style type="text/css">
    .qq-upload-list {
        display: none;
    }

    .list-view .summary {
        display: none;
    }


    .img-icon{
        text-align: center;
        padding-top: 10px;
        padding-bottom: 10px;
        border-right: 1px solid #e2e8ec;
    }
    .status-28-text{
        background-color : #ba121b;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-top: solid 1px #fff;
    }
    .status-28{
        border-bottom:5px solid #ba121b !important;
    }

    .status-sold-text{
        background-color : #009900;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-top: solid 1px #fff;
    }
    .status-sold{
        border-bottom:5px solid #009900 !important;
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
    input[type="radio"]{
        margin: 0;
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
        width: 396px;
        height: 30px;
        padding: 8px 12px;
        font-size: 24px;
        line-height: 30px;
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
        color: #999
    }

    .tt-dropdown-menu {
        width: 422px;
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
        font-size: 18px;
        line-height: 24px;
    }

    .tt-suggestion.tt-cursor {
        color: #fff;
        background-color: #fcf9b2;

    }

    .tt-suggestion p {
        margin: 0;
    }

    .gist {
        font-size: 14px;
    }

</style>
<div class="content-wrapper clearfix">
    <div id="headline_wrapper">
        <div id="headline_container" class="container">
            <section class="property-search">
            <div class="row-fluid">
            <div class="span5">
                <div id="map" class="col">
                    <img alt=" - " height="428" id="map-imagemap" src="<?php echo Yii::app()->request->baseUrl; ?>/images/map.png" usemap="#ikman_map" width="470">
                    <map id="ikman_map" name="ikman_map">
                        <area class="colombo tooltip" coords="88,273,106,278,114,272,117,275,117,288,107,287,101,291,90,295,84,276,88,273" title="Colombo" href="#5" shape="poly">
                        <area class="nuwaraeliya tooltip" coords="145,290,146,281,140,276,141,270,143,267,148,272,153,272,151,263,163,259,169,268,175,268,175,263,172,260,178,252,186,251,186,265,181,272,173,290,159,292,145,289" title="Nuwara Eliya" href="#20" shape="poly">
                        <area class="hambantota tooltip" coords="165,362,161,360,163,358,160,358,161,355,162,349,160,350,159,346,160,345,157,345,155,343,155,339,157,336,160,337,160,335,159,334,161,332,168,336,173,336,177,337,178,339,181,339,183,340,183,340,183,337,182,335,183,333,186,332,190,330,191,330,191,325,193,324,198,322,201,322,204,324,207,325,212,330,216,328,218,326,223,324,226,324,230,321,234,323,235,322,235,317,235,314,240,311,244,309,247,309,255,314,247,322,240,328,236,329,235,330,232,334,225,339,217,345,206,346,202,350,197,352,189,353,183,353,183,354,181,356,178,356,177,357,172,358,169,362,167,363,165,363,165,362,165,361,165,362" title="Hambantota" href="#8" shape="poly">
                        <area class="matara tooltip" coords="138,366,136,365,133,365,134,361,136,359,136,357,135,356,138,353,138,352,135,350,133,347,135,346,135,341,138,341,140,338,138,336,137,334,135,333,133,331,135,330,137,331,141,334,144,333,144,332,143,330,142,330,142,328,145,327,146,327,148,325,152,325,154,323,155,325,155,326,156,328,156,328,158,328,160,328,160,329,160,330,161,331,161,333,160,333,160,335,160,336,159,337,158,336,156,340,155,342,155,343,158,345,160,344,160,346,159,347,159,348,160,349,161,350,162,350,162,352,161,354,160,358,161,359,163,359,162,360,164,362,165,363,165,364,162,364,159,366,156,367,153,368,153,369,152,369,152,368,152,368,147,367,147,368,145,368,142,368,142,368,141,368,140,366,139,364,138,364,138,365,138,365" title="Matara" href="#17" shape="poly">
                        <area class="galle tooltip" coords="134,365,134,361,137,360,137,357,136,356,136,353,138,354,139,352,138,351,136,350,134,347,135,344,135,342,138,341,140,339,138,336,137,334,136,333,133,332,134,330,137,331,140,333,141,333,142,334,144,333,144,332,143,330,142,330,142,328,145,328,145,326,143,325,141,324,138,324,135,322,131,323,126,325,126,330,123,327,120,327,119,327,118,328,118,329,115,329,111,328,109,327,106,325,103,323,99,322,100,327,101,333,105,342,107,348,112,354,117,357,122,361,125,363,132,365,134,365,134," title="Galle" href="#6" shape="poly">
                        <area class="kalutara tooltip" coords="100,322,106,325,109,326,111,328,116,329,119,329,119,327,122,327,126,331,127,331,127,329,126,326,126,325,135,322,132,318,128,312,126,310,127,308,123,303,123,301,119,296,118,292,117,288,117,287,113,287,112,286,111,288,107,287,103,290,100,291,95,292,91,292,89,294,98,315,98,319,97,321,100,323,100,322,100,322" title="Kalutara" href="#10" shape="poly">
                        <area class="colombo tooltip" coords="90,293,95,291,99,292,102,290,107,287,110,287,114,287,117,287,118,287,119,286,117,285,117,282,117,274,115,272,113,272,111,272,107,277,106,278,103,277,101,276,99,275,96,275,93,275,90,275,89,274,88,272,86,276,86,280,86,284,88,290,90,293,91,292" title="Colombo" href="#5" shape="poly">
                        <area class="nuwaraeliya tooltip" coords="144,288,146,290,149,290,150,291,154,291,156,291,157,292,158,292,159,291,161,290,166,291,171,289,172,289,175,287,175,286,173,285,174,284,176,284,176,282,178,281,178,276,180,275,180,272,181,270,182,270,185,267,186,262,186,258,186,257,186,257,187,254,186,254,186,251,184,251,182,251,180,252,178,251,177,251,176,252,176,254,173,257,172,259,173,261,175,263,175,265,175,266,174,269,170,269,168,267,167,264,166,262,164,260,163,259,161,259,159,259,158,260,156,261,153,261,150,262,150,263,150,264,152,267,153,269,153,271,151,272,147,271,144,269,143,267,143,265,140,269,140,273,140,277,141,278,144,280,146,281,146,284,144,286,144,286,144,288,144,289" title="Nuwara Eliya" href="#20" shape="poly">
                        <area class="nuwaraeliya tooltip" coords="144,288,146,290,149,290,150,291,154,291,156,291,157,292,158,292,159,291,161,290,166,291,171,289,172,289,175,287,175,286,173,285,174,284,176,284,176,282,178,281,178,276,180,275,180,272,181,270,182,270,185,267,186,262,186,258,186,257,186,257,187,254,186,254,186,251,184,251,182,251,180,252,178,251,177,251,176,252,176,254,173,257,172,259,173,261,175,263,175,265,175,266,174,269,170,269,168,267,167,264,166,262,164,260,163,259,161,259,159,259,158,260,156,261,153,261,150,262,150,263,150,264,152,267,153,269,153,271,151,272,147,271,144,269,143,267,143,265,140,269,140,273,140,277,141,278,144,280,146,281,146,284,144,286,144,286,144,288,144,289" title="Nuwara Eliya" href="#20" shape="poly">
                        <area class="gampaha tooltip" coords="85,246,90,247,91,245,93,245,96,243,99,241,103,243,104,243,108,241,112,240,113,240,114,242,117,244,119,246,117,249,114,252,114,255,115,258,118,258,118,259,116,260,116,261,115,263,115,267,117,269,117,272,117,274,115,274,113,272,110,273,109,275,108,277,107,278,105,278,101,277,100,275,97,275,94,275,91,275,87,272,87,270,86,267,85,260,87,262,87,258,87,255,86,249,84,250,85,245,86,245" title="Gampaha" href="#7" shape="poly">
                        <area class="kandy tooltip" coords="142,265,141,259,142,257,146,256,148,255,149,254,147,251,145,248,145,246,141,244,143,243,140,241,138,237,141,236,142,233,143,232,146,233,147,232,149,230,150,229,153,229,155,231,157,233,160,235,162,234,165,231,164,230,163,229,163,226,165,225,167,227,167,229,170,230,170,230,173,229,175,226,177,226,180,225,181,227,183,226,184,224,188,226,188,229,188,234,190,242,191,246,191,250,189,250,188,251,184,251,182,251,178,251,176,253,175,255,173,258,172,261,174,262,175,265,175,266,173,268,171,269,168,268,167,265,166,263,164,260,161,259,159,259,156,261,153,263,150,263,150,264,152,266,153,269,153,271,152,273,149,273,145,271,144,267,142,265,142,264,142,263" title="Kandy" href="#11" shape="poly">
                        <area class="ampara tooltip" coords="246,307,249,274,245,262,237,259,236,252,240,248,232,227,223,231,222,237,219,238,218,245,215,245,213,238,210,238,207,232,208,218,206,216,199,222,193,222,188,212,188,202,198,203,208,208,210,200,217,200,220,206,230,209,229,216,234,221,249,221,251,231,263,224,271,246,262,299,255,313,246,307" title="Ampara" href="#1" shape="poly">
                        <area class="anuradhapura tooltip" coords="100,155,110,160,138,172,138,181,142,182,144,195,155,189,163,177,169,175,168,165,172,155,172,150,182,149,183,141,190,132,185,131,184,123,180,117,182,114,179,105,182,99,179,95,171,91,164,96,153,96,158,102,159,104,146,117,139,114,130,126,125,126,120,114,111,117,103,116,103,134,95,142,100,155" title="Anuradhapura" href="#2" shape="poly">
                        <area class="badulla tooltip" coords="174,289,181,271,183,271,187,257,186,252,191,248,186,218,188,213,193,222,202,221,205,216,208,217,208,223,207,228,209,236,213,240,213,243,210,244,206,252,201,252,200,255,205,261,209,261,212,264,210,274,207,274,194,292,198,295,195,301,198,306,192,312,190,310,191,307,184,298,176,301,174,297,177,290,174,289" title="Badulla" href="#3" shape="poly">
                        <area class="batticaloa tooltip" coords="211,199,211,197,212,182,222,182,218,174,218,154,227,154,261,214,264,228,262,232,257,225,252,230,248,220,237,221,230,217,230,208,220,206,216,201,210,200" title="Batticaloa" href="#4" shape="poly">
                        <area class="jaffna tooltip" coords="67,35,93,9,121,6,153,40,128,22,123,28,99,28,71,42" title="Jaffna" href="#9" shape="poly">
                        <area class="kegalle tooltip" coords="117,258,115,266,116,276,121,274,120,277,128,286,134,283,144,286,145,283,143,279,140,279,139,270,143,266,141,259,149,254,137,235,131,233,131,239,118,245,114,256,118,259" title="Kegalle" href="#12" shape="poly">
                        <area class="kilinochchi tooltip" coords="104,29,116,38,99,40,96,59,110,64,117,62,122,54,135,56,134,51,137,54,144,52,148,48,152,49,154,42,127,22,121,31,105,29" title="Kilinochchi" href="#13" shape="poly">
                        <area class="kurunegala tooltip" coords="95,244,91,218,96,203,100,199,99,195,112,181,114,175,109,160,129,167,138,173,138,181,141,182,149,206,152,226,149,232,143,234,139,238,132,233,129,240,117,246,112,240,102,245,99,242,94,245" title="Kurunegala" href="#14" shape="poly">
                        <area class="mannar tooltip" coords="73,76,91,87,94,94,92,104,95,111,91,125,103,129,104,115,110,118,120,113,117,106,120,100,135,99,135,92,132,87,120,89,117,81,119,78,116,64,72,75" title="Mannar" href="#15" shape="poly">
                        <area class="matale tooltip" coords="146,194,153,189,156,190,162,179,169,176,170,180,174,178,176,181,172,185,172,195,166,196,169,208,188,202,186,225,181,227,176,227,170,231,165,225,163,227,163,232,160,235,151,229,152,225,150,218,151,210,145,193" title="Matale" href="#16" shape="poly">
                        <area class="monaragala tooltip" coords="246,308,247,281,248,275,245,263,237,259,236,252,238,248,232,226,223,231,224,235,220,238,218,246,212,243,205,253,201,252,201,255,206,261,210,261,212,264,209,274,206,276,197,288,195,293,198,295,195,300,198,307,192,312,190,306,184,298,182,300,174,318,176,327,184,334,191,330,191,326,200,321,214,331,230,322,235,323,236,313,246,308" title="Moneragala" href="#18" shape="poly">
                        <area class="mullativu tooltip" coords="116,64,120,78,117,82,118,89,133,88,139,81,137,74,146,74,148,76,158,74,162,79,162,82,166,81,171,84,171,90,187,84,169,52,155,43,154,49,147,48,146,51,138,53,135,56,122,56,114,65" title="Mullativu" href="#19" shape="poly">
                        <area class="polonnaruwa tooltip" coords="218,155,218,176,221,178,221,182,212,182,210,192,210,206,207,208,200,206,197,202,181,203,175,205,168,206,166,196,173,194,171,185,175,180,172,178,170,179,168,175,169,171,167,166,170,160,173,153,172,150,181,150,184,144,189,151,197,151,208,156,208,163,212,162,216,155" title="Polonnaruwa" href="#21" shape="poly">
                        <area class="puttalam tooltip" coords="94,244,92,232,90,218,95,204,99,201,99,196,109,182,112,181,114,174,111,168,109,159,99,155,96,142,103,132,102,129,79,122,71,162,80,205,80,227,85,247,94,246" title="Puttalam" href="#22" shape="poly">
                        <area class="ratnapura tooltip" coords="117,276,118,290,119,297,128,308,127,311,134,323,145,327,154,324,157,329,160,328,161,333,184,340,183,335,175,327,173,317,183,298,174,300,173,297,177,291,164,291,158,292,146,290,144,285,135,283,129,287,118,275" title="Ratnapura" href="#23" shape="poly">
                        <area class="trincomalee tooltip" coords="172,90,182,96,182,100,179,105,181,112,180,117,184,124,185,130,190,133,183,141,188,151,200,152,208,156,208,163,211,162,215,154,227,154,221,126,189,86,171,91" title="Trincomalee" href="#24" shape="poly">
                        <area class="vavuniya tooltip" coords="117,107,120,99,127,100,135,99,135,91,132,89,139,82,140,77,136,75,144,74,149,77,157,74,162,78,162,83,165,82,169,83,170,91,163,95,153,97,157,103,157,105,146,116,139,113,136,118,130,125,125,126,125,121,122,119,117,107" title="Vavuniya" href="#25" shape="poly">
                    </map>

                </div>
            </div>
            <div class="span7" id="search-box1">
                <div class="search-wrapper">
                    <div class="search-form-v1">
                        <div class="row-fluid" style="padding-bottom:15px; margin-left: 0">
                            <p style="color: #000; font-size: 20px; font-weight: bold">Search Properties</p>
                            <div class="form">
                                <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'register-form',
                                    'enableClientValidation'=>true,
                                    'clientOptions'=>array(
                                        'validateOnSubmit'=>true,
                                        'validateOnChange'=>true
                                    ),
                                    'htmlOptions'=>array('class'=>'form-horizontal')
                                )); ?>
                                <div class="span12" style="margin-top: 15px; margin-bottom: 10px">
                                    <div class="span5">
                                        <p class="search-info" style="font-size: 15px !important;">Please Select the Property Type:</p>
                                    </div>
                                    <div class="span7">
                                        <div class="row-fluid">
                                            <div class="compactRadioGroup" style="margin: 0px 0 0;">
                                                <?php
                                                echo $form->radioButtonList($model, 'type',array('buy'=>'Buy', 'rent'=>'Rent', 'sold'=>'Sold'), array('labelOptions' => array('style'=>'display:inline;'), 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;'));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label>Enter your Town or City</label>
                                <div class="span12" style="margin-left: 0;margin-bottom: 10px">
                                    <div class="span10">
                                        <?php echo $form->textField($model,'townname', array('placeholder'=>'e.g: Colombo; Gampaha ; Anuradhapura', 'class' => 'span11 typeahead', 'id' => 'townname', 'style' => 'z-index: 2')); ?>
                                    </div>
                                    <div class="span2" >
                                        <a href="javascript:SearchProperty();" class="btn btn-primary">Search</a>
                                    </div>
                                </div>
                                <div class="span12"  style="margin-left: 0; margin-top: 15px">
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <!--<style type="text/css">
                                                .bootstrap-select > .btn {
                                                    width: 130px;
                                                }
                                            </style>-->
                                            <label>Property Type:</label>
                                            <?php $this->widget('ext.bootstrap-select.TbSelect',array(
                                                'model' => $modeltype,
                                                'attribute' => 'typeid',
                                                'data' => CHtml::listData(Propertytype::model()->findAll(),'id','proptype'),
                                                'htmlOptions' => array(
                                                    'multiple' => true,
                                                    'multiple title'=> 'Property Type',
                                                    'id' => 'prop_type'
                                                ),
                                                'options'=> array('width'=>'130px')
                                            )); ?>
                                            <?php echo $form->error($modeltype, 'typeid'); ?>

                                        </div>
                                        <div class="span2">
                                            <label>Min Beds:</label>
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
                                                'data' => $array_minbedrooms,
                                                'options'=> array('width'=>'fit'),
                                                'htmlOptions'=> array('id' => 'min_bed')
                                            )); ?>
                                        </div>
                                        <div class="span2">
                                            <label>Max Beds:</label>
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
                                                'data' => $array_maxbedrooms,
                                                'options'=> array('width'=>'fit'),
                                                'htmlOptions'=> array('id' => 'max_bed')
                                            )); ?>
                                        </div>
                                        <div class="span2">
                                            <label>Min Price:</label>
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
                                                'data' => $array_minprice,
                                                'options'=> array('width'=>'fit'),
                                                'htmlOptions'=> array('id' => 'min_price')
                                            )); ?>
                                        </div>
                                        <div class="span2">
                                            <label>Max Price:</label>
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
                                                'data' => $array_maxprice,
                                                'options'=> array('width'=>'fit'),
                                                'htmlOptions'=> array('id' => 'max_price')
                                            )); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </section>

        </div>
    </div><!-- /#headline-wrapper -->
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span9">
                        <div id="property_list">
                            <div id="title-listing" class="container">
                                <div class="property-list-title">Featured Properties</div>
                                <div class="property-list-by">
                                    <a class="current" href="javascript:LoadFeaturedList('all');">All</a>
                                    <a class="" href="javascript:LoadFeaturedList('buy');">Buy</a>
                                    <a class="" href="javascript:LoadFeaturedList('rent');">Rent</a>
                                </div>
                            </div><!-- /#title-listing -->
                            <div class="property-row">
                                <div class="container-fluid">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <?php
                                            if (isset($_GET['type'])) {
                                                if ($_GET['type'] == "all") {
                                                    $condition = 'pricetype = 3 AND status = 1 ';
                                                } elseif($_GET['type'] == "buy"){
                                                    $condition = '(type = 1 OR type = 2) AND pricetype = 3 AND status = 1';
                                                } elseif($_GET['type'] == "rent"){
                                                    $condition = 'type = 3 AND pricetype = 3 AND status = 1';
                                                }
                                            }
                                            else {
                                                $condition = 'pricetype = 3 AND status = 1 ';
                                            }

                                            $this->widget('zii.widgets.CListView', array(
                                                'id' => 'list_featured',
                                                'dataProvider'=>new CActiveDataProvider('Property', array('criteria'=>array('condition'=> $condition,'order' => 'entrydate DESC LIMIT 20'),'pagination'=>false)),
                                                'itemView' => '_featured_list_view'
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style type="text/css">
                            .jcarousel{
                                height: 500px;
                            }
                            .jcontainer{
                                width: 2100px;
                            }

                            .jcarousel .span3{
                                height: 500px;
                            }
                        </style>
                        <div id="property_info">
                            <div class="carousel-wrapper">
                                <div id="recent-title-listing">
                                    <div class="recent-property-list-title">Recent Properties</div>
                                    <div class="recent-property-list-by">
                                        <div class="jcarousel-control">
                                            <a href="#" class="jcarousel-control-prev">
                                                        <span class="icon-stack">
                                                          <i class="icon-stop icon-stack-base"></i>
                                                          <i class="icon-chevron-left"></i>
                                                        </span>
                                            </a>
                                            <a href="#" class="jcarousel-control-next">
                                                        <span class="icon-stack">
                                                          <i class="icon-stop icon-stack-base"></i>
                                                          <i class="icon-chevron-right"></i>
                                                        </span>
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- /#title-listing -->
                                <div class="jcarousel">
                                    <!--<div class="row-fluid">-->
                                        <div class="jcontainer">
                                            <?php
                                            $condition = '(type = 1 OR type = 2 OR type = 3) AND status = 1';
                                            $recent_property_array = Property::model()->findAll(array('condition'=> $condition,'order' => 'entrydate DESC LIMIT 8'));

                                            foreach($recent_property_array as $data){ ?>
                                                <div class="span3">
                                                    <article class="property-item">
                                                        <div class="property-images">
                                                            <a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' .$data->pid;?>" title="<?php echo $data->pid; ?>">
                                                                <?php
                                                                $imgname = "";

                                                                if (count($data->propertyimages) > 0) {

                                                                    foreach ($data->propertyimages as $value) {

                                                                        if ($value->primaryimg == 1) {

                                                                            $imgname = $value->imagename;
                                                                        }
                                                                    }

                                                                    if ($imgname != "") {

                                                                        if (($data->type == 1 || $data->type == 2 || $data->type == 4) && $data->status == 1) { ?>

                                                                            <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $imgname ?>" class="status-35 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                                                                        <?php }

                                                                        if (($data->type == 3  || $data->type == 5) && $data->status == 1) { ?>

                                                                            <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $imgname ?>" class="status-28 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                                                                        <?php }

                                                                        if ($data->status == 2) { ?>

                                                                            <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $imgname ?>" class="status-sold wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                                                                        <?php }


                                                                    } else {

                                                                        if (($data->type == 1 || $data->type == 2 || $data->type == 4) && $data->status == 1) { ?>

                                                                            <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $data->propertyimages[0]->imagename ?>" class="status-35 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                                                                        <?php }

                                                                        if (($data->type == 3  || $data->type == 5) && $data->status == 1) { ?>

                                                                            <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $data->propertyimages[0]->imagename ?>" class="status-28 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                                                                        <?php }

                                                                        if ($data->status == 2) { ?>

                                                                            <img width="540" height="360" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'. $data->propertyimages[0]->imagename ?>" class="status-sold wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                                                                        <?php }



                                                                    }
                                                                } else {

                                                                    if (($data->type == 1 || $data->type == 2 || $data->type == 4) && $data->status == 1) { ?>

                                                                        <img width="540" height="360" src="<?php echo Yii::app()->baseUrl;?>/upload/propertyimages/prop_no_img.jpg" class="status-35 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                                                                    <?php }

                                                                    if (($data->type == 3  || $data->type == 5) && $data->status == 1) { ?>

                                                                        <img width="540" height="360" src="<?php echo Yii::app()->baseUrl;?>/upload/propertyimages/prop_no_img.jpg" class="status-28 wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                                                                    <?php }

                                                                    if ($data->status == 2) { ?>

                                                                        <img width="540" height="360" src="<?php echo Yii::app()->baseUrl;?>/upload/propertyimages/prop_no_img.jpg" class="status-sold wp-post-image" alt="<?php echo $data->pid; ?>" title="<?php echo $data->pid; ?>" />

                                                                    <?php }
                                                                } ?>

                                                            </a>
                                                            <div>
                                                                <?php
                                                                if ($data->type == 1 || $data->type == 2) {
                                                                    echo "<div class='property-status status-35-text'> On Sale</div>";
                                                                } elseif ($data->type == 3) {
                                                                    echo "<div class='property-status status-28-text'> For Rent</div>";
                                                                }
                                                                ?>
                                                            </div>
                                                        </div><!-- /.property-images -->
                                                        <div class="property-attribute">
                                                            <h3 class="attribute-title text-center"><a href="<?php echo Yii::app()->baseUrl . '/list/detail?pid=' .$data->pid;?>"><?php echo ucwords($data->townname); ?></a></h3>
                                                            <div class="attribute-price">
                                                                    <span class="attr-pricing"><sup class="price-curr">Rs.</sup>
                                                                        <?php
                                                                        if ($data->type == 1 || $data->type == 2) {
                                                                            echo Yii::app()->numberFormatter->format("#,##0", $data->price);
                                                                        } elseif ($data->type == 3) {
                                                                            echo Yii::app()->numberFormatter->format("#,##0", $data->monthlyrent);
                                                                        }
                                                                        ?>
                                                                    </span>

                                                            </div>
                                                        </div>
                                                        <div class="property-meta clearfix row-fluid">
                                                            <div class="span4 img-icon" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/beds.png"/>&nbsp;<?php echo $data->bedrooms;?></div>
                                                            <div class="span4 img-icon"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/baths.png"/>&nbsp;<?php echo $data->bathrooms;?></div>
                                                            <div class="span4 img-icon"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/parking_spaces.png"/>&nbsp;<?php echo $data->parkingspaces;?></div>
                                                            <!--<div class="meta-size meta-block"><i class="ico-size"></i><span class="meta-text">240M</span></div>
                                                            <div class="meta-bedroom meta-block"><i class="ico-bedroom"></i><span class="meta-text">3</span></div>
                                                            <div class="meta-bathroom meta-block"><i class="ico-bathroom"></i><span class="meta-text">5</span></div>-->
                                                        </div>
                                                    </article>
                                                </div>
                                            <?php } ?>
                                        </div><!-- jcontainer -->
                                    <!--</div>-->
                                </div><!-- /.jcarousel -->
                            </div><!-- /.container -->
                        </div>
                    </div>
                    <!-----------Advertisement Section Begin----------->
                    <div class="span3 hidden-phone">
                        <?php

                        $condition = '(page = 1 AND (size = 1 OR size = 3 OR size = 5) AND status = 1) AND expiredate >= CURDATE()';

                        $this->widget('zii.widgets.CListView', array(
                            'id' => 'list_advertisement',
                            'dataProvider'=>new CActiveDataProvider('Advertising', array('criteria'=>array('condition'=> $condition,'order' => 'entrydate DESC'),'pagination'=>false)),
                            'itemView' => '_ads_list_view'
                        ));
                        ?>
                    </div>
                    <!-----------Advertisement Section End----------->
                </div>
            </div>
        </div>
    </div>
</div><!-- /.content-wrapper -->
