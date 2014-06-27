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
            $('.heading_buy').css('background-color', '#660099');


        }

        if ('<?php echo $_GET['type']?>' == 'rent') {
            $('#menu-primary-menu li').removeClass('current_page_item');
            $('#menu-primary-menu li#rent').addClass('current_page_item');
            $('.heading_buy').css('background-color', '#009900');
        }

        if ('<?php echo $_GET['type']?>' == 'sold') {
            $('#menu-primary-menu li').removeClass('current_page_item');
            $('#menu-primary-menu li#sold').addClass('current_page_item');
            $('.heading_buy').css('background-color', '#CC0000');
        }

    });

    function Refine_Search(){
        alert("refine");
        //$('select').val('0');
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
                    window.document.location.replace('<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/<?php echo $_GET['type']; ?>');
                }
            }
        });
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
            <div id="headline_wrapper">
                <div id="headline_container" class="container">
                    <section class="property-search">
                        <div class="row-fluid">
                            <div class="span5">
                                <div id="map" class="col">
                                    <img alt=" - " height="428" id="map-imagemap" src="<?php echo Yii::app()->request->baseUrl; ?>/images/map.png" usemap="#ikman_map" width="470">
                                    <map id="ikman_map" name="ikman_map">
                                        <area class="colombo tooltip" coords="88,273,106,278,114,272,117,275,117,288,107,287,101,291,90,295,84,276,88,273" title="Colombo" href="#colombo" shape="poly">
                                        <area class="nuwaraeliya tooltip" coords="145,290,146,281,140,276,141,270,143,267,148,272,153,272,151,263,163,259,169,268,175,268,175,263,172,260,178,252,186,251,186,265,181,272,173,290,159,292,145,289" title="Nuwara Eliya" href="#nuwaraeliya" shape="poly">
                                        <area class="hambantota tooltip" coords="165,362,161,360,163,358,160,358,161,355,162,349,160,350,159,346,160,345,157,345,155,343,155,339,157,336,160,337,160,335,159,334,161,332,168,336,173,336,177,337,178,339,181,339,183,340,183,340,183,337,182,335,183,333,186,332,190,330,191,330,191,325,193,324,198,322,201,322,204,324,207,325,212,330,216,328,218,326,223,324,226,324,230,321,234,323,235,322,235,317,235,314,240,311,244,309,247,309,255,314,247,322,240,328,236,329,235,330,232,334,225,339,217,345,206,346,202,350,197,352,189,353,183,353,183,354,181,356,178,356,177,357,172,358,169,362,167,363,165,363,165,362,165,361,165,362" title="Hambantota" href="#hambantota" shape="poly">
                                        <area class="matara tooltip" coords="138,366,136,365,133,365,134,361,136,359,136,357,135,356,138,353,138,352,135,350,133,347,135,346,135,341,138,341,140,338,138,336,137,334,135,333,133,331,135,330,137,331,141,334,144,333,144,332,143,330,142,330,142,328,145,327,146,327,148,325,152,325,154,323,155,325,155,326,156,328,156,328,158,328,160,328,160,329,160,330,161,331,161,333,160,333,160,335,160,336,159,337,158,336,156,340,155,342,155,343,158,345,160,344,160,346,159,347,159,348,160,349,161,350,162,350,162,352,161,354,160,358,161,359,163,359,162,360,164,362,165,363,165,364,162,364,159,366,156,367,153,368,153,369,152,369,152,368,152,368,147,367,147,368,145,368,142,368,142,368,141,368,140,366,139,364,138,364,138,365,138,365" title="Matara" href="#matara" shape="poly">
                                        <area class="galle tooltip" coords="134,365,134,361,137,360,137,357,136,356,136,353,138,354,139,352,138,351,136,350,134,347,135,344,135,342,138,341,140,339,138,336,137,334,136,333,133,332,134,330,137,331,140,333,141,333,142,334,144,333,144,332,143,330,142,330,142,328,145,328,145,326,143,325,141,324,138,324,135,322,131,323,126,325,126,330,123,327,120,327,119,327,118,328,118,329,115,329,111,328,109,327,106,325,103,323,99,322,100,327,101,333,105,342,107,348,112,354,117,357,122,361,125,363,132,365,134,365,134," title="Galle" href="#galle" shape="poly">
                                        <area class="kalutara tooltip" coords="100,322,106,325,109,326,111,328,116,329,119,329,119,327,122,327,126,331,127,331,127,329,126,326,126,325,135,322,132,318,128,312,126,310,127,308,123,303,123,301,119,296,118,292,117,288,117,287,113,287,112,286,111,288,107,287,103,290,100,291,95,292,91,292,89,294,98,315,98,319,97,321,100,323,100,322,100,322" title="Kalutara" href="#kalutara" shape="poly">
                                        <area class="colombo tooltip" coords="90,293,95,291,99,292,102,290,107,287,110,287,114,287,117,287,118,287,119,286,117,285,117,282,117,274,115,272,113,272,111,272,107,277,106,278,103,277,101,276,99,275,96,275,93,275,90,275,89,274,88,272,86,276,86,280,86,284,88,290,90,293,91,292" title="Colombo" href="#colombo" shape="poly">
                                        <area class="nuwaraeliya tooltip" coords="144,288,146,290,149,290,150,291,154,291,156,291,157,292,158,292,159,291,161,290,166,291,171,289,172,289,175,287,175,286,173,285,174,284,176,284,176,282,178,281,178,276,180,275,180,272,181,270,182,270,185,267,186,262,186,258,186,257,186,257,187,254,186,254,186,251,184,251,182,251,180,252,178,251,177,251,176,252,176,254,173,257,172,259,173,261,175,263,175,265,175,266,174,269,170,269,168,267,167,264,166,262,164,260,163,259,161,259,159,259,158,260,156,261,153,261,150,262,150,263,150,264,152,267,153,269,153,271,151,272,147,271,144,269,143,267,143,265,140,269,140,273,140,277,141,278,144,280,146,281,146,284,144,286,144,286,144,288,144,289" title="Nuwara Eliya" href="#nuwaraeliya" shape="poly">
                                        <area class="nuwaraeliya tooltip" coords="144,288,146,290,149,290,150,291,154,291,156,291,157,292,158,292,159,291,161,290,166,291,171,289,172,289,175,287,175,286,173,285,174,284,176,284,176,282,178,281,178,276,180,275,180,272,181,270,182,270,185,267,186,262,186,258,186,257,186,257,187,254,186,254,186,251,184,251,182,251,180,252,178,251,177,251,176,252,176,254,173,257,172,259,173,261,175,263,175,265,175,266,174,269,170,269,168,267,167,264,166,262,164,260,163,259,161,259,159,259,158,260,156,261,153,261,150,262,150,263,150,264,152,267,153,269,153,271,151,272,147,271,144,269,143,267,143,265,140,269,140,273,140,277,141,278,144,280,146,281,146,284,144,286,144,286,144,288,144,289" title="Nuwara Eliya" href="#nuwaraeliya" shape="poly">
                                        <area class="gampaha tooltip" coords="85,246,90,247,91,245,93,245,96,243,99,241,103,243,104,243,108,241,112,240,113,240,114,242,117,244,119,246,117,249,114,252,114,255,115,258,118,258,118,259,116,260,116,261,115,263,115,267,117,269,117,272,117,274,115,274,113,272,110,273,109,275,108,277,107,278,105,278,101,277,100,275,97,275,94,275,91,275,87,272,87,270,86,267,85,260,87,262,87,258,87,255,86,249,84,250,85,245,86,245" title="Gampaha" href="#gampaha" shape="poly">
                                        <area class="kandy tooltip" coords="142,265,141,259,142,257,146,256,148,255,149,254,147,251,145,248,145,246,141,244,143,243,140,241,138,237,141,236,142,233,143,232,146,233,147,232,149,230,150,229,153,229,155,231,157,233,160,235,162,234,165,231,164,230,163,229,163,226,165,225,167,227,167,229,170,230,170,230,173,229,175,226,177,226,180,225,181,227,183,226,184,224,188,226,188,229,188,234,190,242,191,246,191,250,189,250,188,251,184,251,182,251,178,251,176,253,175,255,173,258,172,261,174,262,175,265,175,266,173,268,171,269,168,268,167,265,166,263,164,260,161,259,159,259,156,261,153,263,150,263,150,264,152,266,153,269,153,271,152,273,149,273,145,271,144,267,142,265,142,264,142,263" title="Kandy" href="#kandy" shape="poly">
                                        <area class="ampara tooltip" coords="246,307,249,274,245,262,237,259,236,252,240,248,232,227,223,231,222,237,219,238,218,245,215,245,213,238,210,238,207,232,208,218,206,216,199,222,193,222,188,212,188,202,198,203,208,208,210,200,217,200,220,206,230,209,229,216,234,221,249,221,251,231,263,224,271,246,262,299,255,313,246,307" title="Ampara" href="#ampara" shape="poly">
                                        <area class="anuradhapura tooltip" coords="100,155,110,160,138,172,138,181,142,182,144,195,155,189,163,177,169,175,168,165,172,155,172,150,182,149,183,141,190,132,185,131,184,123,180,117,182,114,179,105,182,99,179,95,171,91,164,96,153,96,158,102,159,104,146,117,139,114,130,126,125,126,120,114,111,117,103,116,103,134,95,142,100,155" title="Anuradhapura" href="#anuradhapura" shape="poly">
                                        <area class="badulla tooltip" coords="174,289,181,271,183,271,187,257,186,252,191,248,186,218,188,213,193,222,202,221,205,216,208,217,208,223,207,228,209,236,213,240,213,243,210,244,206,252,201,252,200,255,205,261,209,261,212,264,210,274,207,274,194,292,198,295,195,301,198,306,192,312,190,310,191,307,184,298,176,301,174,297,177,290,174,289" title="Badulla" href="#badulla" shape="poly">
                                        <area class="batticaloa tooltip" coords="211,199,211,197,212,182,222,182,218,174,218,154,227,154,261,214,264,228,262,232,257,225,252,230,248,220,237,221,230,217,230,208,220,206,216,201,210,200" title="Batticaloa" href="#badulla" shape="poly">
                                        <area class="jaffna tooltip" coords="67,35,93,9,121,6,153,40,128,22,123,28,99,28,71,42" title="Jaffna" href="#jaffna" shape="poly">
                                        <area class="kegalle tooltip" coords="117,258,115,266,116,276,121,274,120,277,128,286,134,283,144,286,145,283,143,279,140,279,139,270,143,266,141,259,149,254,137,235,131,233,131,239,118,245,114,256,118,259" title="Kegalle" href="#kegalle" shape="poly">
                                        <area class="kilinochchi tooltip" coords="104,29,116,38,99,40,96,59,110,64,117,62,122,54,135,56,134,51,137,54,144,52,148,48,152,49,154,42,127,22,121,31,105,29" title="Kilinochchi" href="#kilinochchi" shape="poly">
                                        <area class="kurunegala tooltip" coords="95,244,91,218,96,203,100,199,99,195,112,181,114,175,109,160,129,167,138,173,138,181,141,182,149,206,152,226,149,232,143,234,139,238,132,233,129,240,117,246,112,240,102,245,99,242,94,245" title="Kurunegala" href="#kurunegala" shape="poly">
                                        <area class="mannar tooltip" coords="73,76,91,87,94,94,92,104,95,111,91,125,103,129,104,115,110,118,120,113,117,106,120,100,135,99,135,92,132,87,120,89,117,81,119,78,116,64,72,75" title="Mannar" href="#mannar" shape="poly">
                                        <area class="matale tooltip" coords="146,194,153,189,156,190,162,179,169,176,170,180,174,178,176,181,172,185,172,195,166,196,169,208,188,202,186,225,181,227,176,227,170,231,165,225,163,227,163,232,160,235,151,229,152,225,150,218,151,210,145,193" title="Matale" href="#matale" shape="poly">
                                        <area class="monaragala tooltip" coords="246,308,247,281,248,275,245,263,237,259,236,252,238,248,232,226,223,231,224,235,220,238,218,246,212,243,205,253,201,252,201,255,206,261,210,261,212,264,209,274,206,276,197,288,195,293,198,295,195,300,198,307,192,312,190,306,184,298,182,300,174,318,176,327,184,334,191,330,191,326,200,321,214,331,230,322,235,323,236,313,246,308" title="Moneragala" href="#monaragala" shape="poly">
                                        <area class="mullativu tooltip" coords="116,64,120,78,117,82,118,89,133,88,139,81,137,74,146,74,148,76,158,74,162,79,162,82,166,81,171,84,171,90,187,84,169,52,155,43,154,49,147,48,146,51,138,53,135,56,122,56,114,65" title="Mullativu" href="#mullativu" shape="poly">
                                        <area class="polonnaruwa tooltip" coords="218,155,218,176,221,178,221,182,212,182,210,192,210,206,207,208,200,206,197,202,181,203,175,205,168,206,166,196,173,194,171,185,175,180,172,178,170,179,168,175,169,171,167,166,170,160,173,153,172,150,181,150,184,144,189,151,197,151,208,156,208,163,212,162,216,155" title="Polonnaruwa" href="#polonnaruwa" shape="poly">
                                        <area class="puttalam tooltip" coords="94,244,92,232,90,218,95,204,99,201,99,196,109,182,112,181,114,174,111,168,109,159,99,155,96,142,103,132,102,129,79,122,71,162,80,205,80,227,85,247,94,246" title="Puttalam" href="#puttalam" shape="poly">
                                        <area class="ratnapura tooltip" coords="117,276,118,290,119,297,128,308,127,311,134,323,145,327,154,324,157,329,160,328,161,333,184,340,183,335,175,327,173,317,183,298,174,300,173,297,177,291,164,291,158,292,146,290,144,285,135,283,129,287,118,275" title="Ratnapura" href="#ratnapura" shape="poly">
                                        <area class="trincomalee tooltip" coords="172,90,182,96,182,100,179,105,181,112,180,117,184,124,185,130,190,133,183,141,188,151,200,152,208,156,208,163,211,162,215,154,227,154,221,126,189,86,171,91" title="Trincomalee" href="#trincomalee" shape="poly">
                                        <area class="vavuniya tooltip" coords="117,107,120,99,127,100,135,99,135,91,132,89,139,82,140,77,136,75,144,74,149,77,157,74,162,78,162,83,165,82,169,83,170,91,163,95,153,97,157,103,157,105,146,116,139,113,136,118,130,125,125,126,125,121,122,119,117,107" title="Vavuniya" href="#vavuniya" shape="poly">
                                    </map>

                                </div>
                            </div>
                            <div class="span7">
                                <div class="search-wrapper">
                                    <div class="search-form-v1">
                                        <div class="row-fluid" style="padding-bottom:15px;">
                                            <p style="color: #000; font-size: 20px; font-weight: bold">Search Properties</p>
                                            <p class="search-info">Address, Suburbs, Postcodes, or Regions (separated by commas)</p>
                                            <form role="form">
                                                <div class="span12">
                                                    <div class="span10 input-append">
                                                        <input class="span11" id="appendedDropdownButton" type="text" placeholder="e.g: Colombo; Colombo 08 ; Borella">
                                                        <div class="btn-group">
                                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Suggetions</a></li>
                                                                <li><a href="#">Recent Locations</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">Clear</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="span2">
                                                        <button class="btn btn-info" type="button">Search</button>
                                                    </div>
                                                </div>

                                                <div class="span12">
                                                    <label class="checkbox">
                                                        <input type="checkbox"> Include Surrounding Subburbs
                                                    </label>
                                                </div>
                                                <div class="span12">
                                                    <div class="span3">
                                                        <label>Property Type:</label>
                                                        <div class="btn-group">
                                                            <button class="btn">All</button>
                                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Any</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">House</a></li>
                                                                <li><a href="#">Apartment & Unit</a></li>
                                                                <li><a href="#">Apartment</a></li>
                                                                <li><a href="#">Unit</a></li>
                                                                <li><a href="#">Town House</a></li>
                                                                <li><a href="#">Villa</a></li>
                                                                <li><a href="#">Land</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="span2">
                                                        <label>Min Beds:</label>
                                                        <div class="btn-group">
                                                            <button class="btn">Any</button>
                                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Any</a></li>
                                                                <li><a href="#">Studio</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">1</a></li>
                                                                <li><a href="#">2</a></li>
                                                                <li><a href="#">3</a></li>
                                                                <li><a href="#">4</a></li>
                                                                <li><a href="#">5</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="span2">
                                                        <label>Max Beds:</label>
                                                        <div class="btn-group">
                                                            <button class="btn">Any</button>
                                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Any</a></li>
                                                                <li><a href="#">Studio</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">1</a></li>
                                                                <li><a href="#">2</a></li>
                                                                <li><a href="#">3</a></li>
                                                                <li><a href="#">4</a></li>
                                                                <li><a href="#">5</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="span2">
                                                        <label>Min Price:</label>
                                                        <div class="btn-group">
                                                            <button class="btn">Any</button>
                                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Any</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">50,000</a></li>
                                                                <li><a href="#">100,000</a></li>
                                                                <li><a href="#">150,000</a></li>
                                                                <li><a href="#">200,000</a></li>
                                                                <li><a href="#">150,000</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="span3">
                                                        <label>Max Price:</label>
                                                        <div class="btn-group">
                                                            <button class="btn">Any</button>
                                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Any</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">50,000</a></li>
                                                                <li><a href="#">100,000</a></li>
                                                                <li><a href="#">150,000</a></li>
                                                                <li><a href="#">200,000</a></li>
                                                                <li><a href="#">150,000</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div><!-- /#headline-wrapper -->
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span9">
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="row-fluid">
                                     <div class="form">
                                     <?php $form=$this->beginWidget('CActiveForm', array(
                                         'id'=>'refinrsearch',
                                         'enableClientValidation'=>true,
                                         'clientOptions'=>array(
                                             'validateOnSubmit'=>true,
                                             'validateOnChange'=>true
                                         ),
                                         'htmlOptions'=>array('class'=>'form-horizontal')
                                     )); ?>
                                         <div id="title-listing" class="container">
                                             <div class="property-list-title" style="font-size: 18px; color: #ff0000">Refine Search By:</div>
                                         </div>
                                         <div class="span12" style="display: none">
                                             <label>Location</label>
                                             <div class="span12" style="margin-left: 0;">
                                                 <?php echo $form->textField($model,'townname', array('placeholder'=>'e.g: Colombo; Anuradhapura; ', 'class' => 'span10', 'id' => 'townname')); ?>
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
                                         <div class="span12">
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
                                                         'options'=> array('width'=>'fit'),
                                                         'htmlOptions'=> array('id' => 'min_price')
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
                                                         'options'=> array('width'=>'fit'),
                                                         'htmlOptions'=> array('id' => 'max_price')
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
                                                     'options'=> array('width'=>'fit'),
                                                     'htmlOptions'=> array('id' => 'min_bed')
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
                                                     'options'=> array('width'=>'fit'),
                                                     'htmlOptions'=> array('id' => 'max_bed')
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
                                                     'options'=> array('width'=>'fit'),
                                                     'htmlOptions'=> array('id' => 'bathrooms')
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
                                                     'options'=> array('width'=>'fit'),
                                                     'htmlOptions'=> array('id' => 'carspaces')
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
                                                 'options'=> array('width'=>'fit'),
                                                 'htmlOptions'=> array('id' => 'condition')
                                             )); ?>
                                         </div>
                                         <div class="span12" style="padding-top: 10px;">
                                             <label class="checkbox">
                                                 <?php echo $array_searchpara->premiere; ?>
                                                 <?php echo CHtml::checkBoxList('pricetype', '', array(1 => 'Search only Premiere Properties'), array('labelOptions'=> array('class'=>'span9'))); ?>
                                             </label>
                                         </div>
                                         <div class="span12" style="padding: 10px 0;">
                                             <div class="span6">
                                                 <a href="javascript:SearchProperty();" class="btn btn-primary">Update</a>
                                             </div>
                                             <div class="span6">
                                                 <a href="javascript:Refine_Search();" style="font-size: 12px;">clear all</a>
                                             </div>
                                         </div>
                                     <?php $this->endWidget(); ?>
                                     </div>
                                    <div calss="span12">
                                        <div class="row-fluid  hidden-phone">
                                            <div calss="ads_placeholder_large"  style="padding-top: 20px;">
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/add-left.jpg" alt="advertiesment"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="span8">
                                <div class="row-fluid">
                                    <div id="title-listing" class="container-fluid">
                                        <div class="property-list-title">
                                            <?php

                                            if (isset($_GET['type'])) {

                                                if ($_GET['type'] == "buy") {

                                                    if (isset($_SESSION['search']['district'])) {

                                                        $district =  District::model()->findByPk($_SESSION['search']['district']);
                                                        echo "Properties for Sale in " . $district->name;

                                                    } else {
                                                        echo "Properties for Sale";
                                                    }

                                                } elseif ($_GET['type'] == "rent") {

                                                    if (isset($_SESSION['search']['district'])) {

                                                        $district =  District::model()->findByPk($_GET['district']);
                                                        echo "Properties for Rent in " . $district->name;

                                                    } else {
                                                        echo "Properties for Rent";
                                                    }

                                                } elseif ($_GET['type'] == "sold") {

                                                    if (isset($_SESSION['search']['district'])) {

                                                        $district =  District::model()->findByPk($_GET['district']);
                                                        echo "Properties for Sold in " . $district->name;

                                                    } else {
                                                        echo "Properties for Sold";
                                                    }

                                                }

                                            }

                                            ?>

                                        </div>
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


                                    $criteria->order = 'pricetype DESC';

                                    $dataprovider = new CActiveDataProvider('Property', array('criteria'=> $criteria ,'pagination'=>array('pageSize'=>10)));

                                   //echo $dataprovider->criteria->condition . '<br>';

                                    $this->widget('zii.widgets.CListView', array(
                                        'id' => 'list_property',
                                        'dataProvider'=>$dataprovider,
                                        'itemView' => '_list_view',
                                        'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Advertiesments--->
                    <div class="span3 hidden-phone">
                        <div class="row-fluid">
                            <div calss="ads_placeholder span6" style="padding-top: 30px;">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ad.jpg" alt="advertiesment"/>
                            </div>
                            <div calss="ads_placeholder span6" style="padding-top: 20px;">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Advertise-Here.jpg" alt="advertiesment"/>
                            </div>
                            <div calss="ads_placeholder span6"  style="padding-top: 20px;">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/zillow.png" alt="advertiesment"/>
                            </div>
                            <div calss="ads_placeholder_large span6"  style="padding-top: 20px;">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ad_large.jpg" alt="advertiesment"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php $this->endWidget(); ?>
    </div>
</div><!-- /.content-wrapper -->
