
<script type="text/javascript">
    $(document).ready(function(){
       
       $('#lnk_list li').each(function(){
          $(this).removeClass('active'); 
       });
       $('#lnk_services').addClass('active');
       
       var url = document.location.href;
       var pos = document.location.href.lastIndexOf('?');
       var length = document.location.href.length;
       
       if ($('#' + url.substring(pos, length).replace('?', '')).position() != undefined) {
           
           var topLocation = $('#' + url.substring(pos, length).replace('?', '')).position().top;
       
           window.scrollTo(0, topLocation);
       }
       
    }
            
    function myFunction() {
        document.getElementById("demo").innerHTML = "Hello World";
    }

            
            );
</script>

  <!--======= BANNER =========-->
  <div class="sub-banner">
    <div class="overlay">
      <div class="container">
        <h1>SERVICES</h1>
       <ol class="breadcrumb">
          <li class="pull-left">services</li>
          <li><a href="<?php echo Yii::app()->request->baseUrl; ?>">Home</a></li>
          <li class="active">services</li>
        </ol>
      </div>
    </div>
  </div>

  
    <!--======= TITTLE =========-->
      <div class="tittle" style="margin-top: 50px; margin-bottom: 10px;"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-top.png" alt="">
          <h3>Services we provide</h3>
       </div>
    
    <!--======= SERVICES =========-->
    
   <div class="container contactHeight">
    <div class="section service-content">
                    <div class="container margin-top">
                        
                        <div class="media service-graph-1 " style="margin-top:-20px">
                            <div class="media-left pr100 media-image">
                                <img class="img_1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/service-img-1.jpg" alt="">
                            </div>
                            <div class="media-right padding-top-2 pr25" style="padding-left:100px;">
                            <div id="marketing">Project Marketing</div>
                                <p class="heading_txt heading_txt1">Get the “SOLD” Tag next to your project with My Property !</p>
                                <p class="p_txt p_txt1">With the vast experience we have on selling Projects in Australia to our global clientele, Sri Lankan properties will be offered to the local as well as to the international markets through our sales network. Sri Lankan Projects are currently being offered to China, Australia, UK, USA, Singapore and UAE through our international network. Our ONE-STOP-SHOP services to the investors and expats will be an added advantage when you sell your project through My Property.</p>
                            </div>
                        </div>
                        
                        <div class="media service-graph-2 " style="margin-top:25px;">
                            <div class="media-left padding-top pl30" style="padding-right:100px;">
                                <div id="brokerage">Property Brokerage  
                                    <p>   <button type="button" class="btn" data-toggle="modal" data-target="#myModal">Marketing Packages</button> </p>
                                </div>
                                <p class="heading_txt heading_txt2">Talk to us to sell your property or buy your next property with confidence !</p>
                                <p class="p_txt p_txt2">Property hunting is exciting business but it can be tedious and daunting especially for first time buyers.  Let us do the hard work so that you can focus on your loved ones and what matters the most. We at My property are here to provide you with everything you need to make the process easy and fun while giving our clients that edge in their property search helping them be the most informed at that moment of purchase.
                                    <br>  From identifying the right property, making a buying decision to home loans we are here to help you in every step of the way.
                                    <br>  We offer property brokerage throughout Sri Lanka for Residential as well as commercial properties. Whether you want to sell your house/ office complex or buy a new house / apartment or an office, you will be delighted with our professional service. All transactions will be done on a transparent and a professional manner with Legal agreements in place to protect both buyers and sellers. </p>
                                
                            </div>
                            <div class="media-right pl100 media-image">
                                <img class="img_2" src="<?php echo Yii::app()->request->baseUrl; ?>/images/service-img-2.jpg" alt="">
                            </div>
                        </div>
                        
                        <div class="media service-graph ">
                            <div class="media-left pr100 media-image ">
                                <img class="img_3" src="<?php echo Yii::app()->request->baseUrl; ?>/images/service-img-3.jpg" alt="">
                            </div>                            
                            <div class="media-right padding-top pr25" style="padding-left:100px;">
                                <div id="management">Property Management</div>
                                <p class="heading_txt heading_txt3">Property Management at its best !</p>
                                <p class="p_txt p_txt3" >Whether you are overseas or in Sri Lanka, we can make the rental and property management process as less painful as possible. We take care of the end to end property management process, from finding a suitable tenant to Property maintenance, tenant assistance and coordinating legal and administration work.</p>
                            </div>
                        </div>
                        
                        <div class="media service-graph-4 ">
                            <div class="media-left padding-top pl30" style="padding-right:100px;">
                            <div id="investment">Investment Advisory</div>
                                <p class="heading_txt heading_txt4" >Talk to us before you invest on your next property !</p>
                                <p class="p_txt p_txt4">We are specialised in giving real estate investment advice for our clients to make the right decisions at the right time. We strongly advise our clients to diversify their real estate investments and assist them in doing so. Our wide range of Investment Property Stock in Sri Lanka and overseas will enable us to assist our clients in choosing the properties from right locations and at the right time.</p>
                            </div>
                            <div class="media-right pl100 media-image">
                                <img class="img_4" src="<?php echo Yii::app()->request->baseUrl; ?>/images/service-img-4.jpg" alt="">
                            </div>
                        </div>
                        
                    </div>
                </div>
   </div>
