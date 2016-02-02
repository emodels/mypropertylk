<script type="text/javascript">
    $(document).ready(function(){
       
       $('#lnk_list li').each(function(){
          $(this).removeClass('active'); 
       });
       $('#lnk_about').addClass('active');
    });
</script>

 <!--======= BANNER =========-->
  <div class="sub-banner">
    <div class="overlay">
      <div class="container">
        <h1>ABOUT US</h1>
        <ol class="breadcrumb">
          <li class="pull-left">ABOUT us</li>
          <li><a href="<?php echo Yii::app()->request->baseUrl; ?>">Home</a></li>
          <li class="active">ABOUT Us</li>
        </ol>
      </div>
    </div>
  </div>


  <!--======= WHAT WE DO =========-->
  <section class="what-we-do">
    <div class="container">


            <!--======= TITTLE =========-->
          <div class="tittle" style="margin-top: -30px; margin-bottom: 10px;"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-top.png" alt="">
              <h3>Who we are</h3>
          </div>
        <div class="media service-graph">
              <div class="media-left pr100 media-image">
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about-us.jpg" alt="">
              </div>
          
            <div class="media-right padding-top-2 pr25">

            <div class="des">
                <p>  My Property Pvt Ltd is wholly own subsidiary of Dwellings Group based in Australia, and specializes in marketing Sri Lankan real estate in both local and International markets.
                <br>At My property we strive to be Sri Lanka’s foremost fully integrated real estate solution provider, where we offer ONE-STOP-SHOP services to all our client.<br>
                When it comes to buying, selling, renting, property management and development, we at Myproperty aspire to provide our clients with the ultimate real estate experience.  Regardless of your real estate aspirations the knowledgeable and professional team at Myproperty will be with you every step of the way.
                </p>
            </div>
          </div>
            
        </div>
     </div>
  </section>