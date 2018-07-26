

<div class="pos-rel">

   <div class="bg-banner">

      <div class="container">

         <div class="title-banner"><?php //echo $this->lang->line('Publications');

         echo $banner['banner_heading'];

         ?></div>

      </div>

   </div>

   <div class="img-banner" style="background:url('<?php echo base_url('images/banner/'.$banner['banner_image']);?>') no-repeat center 0;width:100%;"></div>

</div>



<div id="map"></div>



<div class="content">

   <div class="container">

      <div class="row">

         <div class="col-sm-5 col-md-4 xs30">

            <div class="t-contact"><?php echo $web['setting_name']; ?></div>

            <div class="w-contact">

               <p><?php echo nl2br($web['setting_address']);?> <?php echo $web['setting_postcode'];?></p>

               <p></p>

               <p></p><br/>

            </div>

            <div class="w-contact">

               <div class="mb5">



                  <div class="w70 inline-block">Phone</div>



                  <div class="inline-block">: &nbsp;<a href="tel:<?php echo $web['setting_phone'];?>"><?php echo $web['setting_phone'];?></a></div>

               </div>

               <div class="mb5">

                  <div class="w70 inline-block">Fax</div>

                  <div class="inline-block">: &nbsp;<a href="tel:<?php echo $web['setting_fax'];?>"><?php echo $web['setting_fax'];?></a></div>

               </div>

               <div>

                  <div class="w70 inline-block">Website</div>

                  <div class="inline-block">: &nbsp;<a class="link" href="tel:notelponnya"><?php echo $web['setting_website'];?></a></div>

               </div>

            </div>

            <div class="img-map"><img src="<?php echo base_url('images/PTTEP_Maps.jpg');?>" class="img-responsive"/></div>

         </div>

         <div class="col-sm-7 col-md-8">

            <div class="t-contact"><?php echo $contactHeading['article_head'];?> </div>

            <div class="s-contact"><?php echo $contactHeading['article_content'];?> </div>

               <?php

                  if($this->session->flashdata('success')){ ?>

                     <div class="notif-success">

                     <?php echo $this->lang->line('contact_success');  ?>

                     </div>

                     <?php }?>

                  <?php if($this->session->flashdata('failure')){

                     ?>

                     <div class="notif-failrd">

                     <?php

                        echo $this->session->flashdata('failure');

                     ?>

                     </div>

                  <?php } ?>

            <div class="box-form">

               <form action="" method="POST" id="ourForm" novalidate="novalidate">

                  <div class="form-group">

                     <div class="tbl">

                        <div class="cell w80">

                           <label><?=$this->lang->line('contact_nama');?> <span class="red">*</span></label>

                        </div>

                        <div class="cell">

                           <input type="text" minlength="3" class="form-control required" id="message_name" name="message_name">

                        </div>

                     </div>

                  </div>

                  <div class="form-group">

                     <div class="tbl">

                        <div class="cell w80">

                           <label><?=$this->lang->line('contact_email');?> <span class="red">*</span></label>

                        </div>

                        <div class="cell">

                           <input type="text" id="message_email" minlength="3" class="form-control email required" name="message_email">

                        </div>

                     </div>

                  </div>

                  <div class="form-group">

                     <div class="tbl">

                        <div class="cell w80">

                           <label><?=$this->lang->line('contact_phone');?> <span class="red">*</span></label>

                        </div>

                        <div class="cell">

                           <input type="text" id="message_phone" minlength="3" class="form-control number required" name="message_phone">

                        </div>

                     </div>

                  </div>

                  <div class="form-group">

                     <div class="tbl">

                        <div class="cell w80">

                           <label><?=$this->lang->line('contact_message');?> <span class="red">*</span></label>

                        </div>

                        <div class="cell">

                           <textarea type="text" id="message_content" minlength="10" class="form-control required" name="message_content"></textarea>

                        </div>

                     </div>

                  </div>

                  <div class="btn-right form-recaptcha clearfix form-group">

                     <div class="tbl">

                        <div class="cell w80"></div>

                        <div class="cell">

                           <div class="pull-left xs30">

                              <div class="g-recaptcha" data-sitekey="6LePsiIUAAAAAFWREQBnbPENrZW7DPile3PwS47q" data-callback="recaptchaCallback" data-expired-callback="recaptchaExpired"></div>

                              <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">

                           </div>

                           <div class="pull-right" id="recaptcha12">

                              <div class="h75">

                                 <div class="tbl">

                                    <div class="cell">

                                       <button class="btn btn-submit" type="submit" value="getResponse">SEND</button>

                                    </div>

                                 </div>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>

               </form>

            </div>

         </div>

      </div>

   </div>

</div>

</div>

<script src='https://www.google.com/recaptcha/api.js'></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcgmciiqxdPfwsBs3Jg-0WDy4W9LzSmT0&callback=initMap"

  type="text/javascript"></script>

<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->

<script src="js/map/jquery.gomap-1.3.3.min.js" type="text/javascript"></script>



<script>

$(function() {

   $("ul.main-menu li a.nav-about").addClass("current");

   $("#map").goMap({

      zoom: 16,

      scrollwheel: false,

      navigationControl: false,

      mapTypeControl: false,

      disableDoubleClickZoom: true,

      maptype: 'ROADMAP' ,

      markers: [{

          latitude: <?php echo $web['setting_latitude'];?>,

          longitude: <?php echo $web['setting_longitude'];?>,

          icon: 'images/icons/Logo-pin-PTTEP-Maps.png',

          html: {

            content: '<div style="float:left;height:80px;margin-right:10px"><img src=" <?php echo base_url(),'/images/web-logo.png' ?> "/ style="margin-bottom: 10px;"/></div><p><?php echo preg_replace( "/\r|\n/", " ",$web['setting_address']);?> <?php echo $web['setting_postcode'];?></p>',

                popup: true

            }

      }],

      hideByClick: false

   });

      $("#ourForm").validate();

});



    function recaptchaCallback() {

      $('#hiddenRecaptcha').val(grecaptcha.getResponse());

      $('#hiddenRecaptcha').valid();

    };



    function recaptchaExpired(){

      $('#hiddenRecaptcha').val('');

    }

</script>

