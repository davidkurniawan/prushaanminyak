

<div class="pos-rel">

   <div class="bg-banner">

      <div class="container">

         <div class="title-banner"><?php //echo $this->lang->line('Publications');

         echo $banner['banner_heading'];

         ?></div>

      </div>

   </div>

   <div class="img-banner" style="background:url('<?php echo base_url('images/banner/banner-publications.jpg');?>') no-repeat center 0;width:100%;"></div>

</div>



<div class="content">

   <div class="container">

      <div class="row">

         <div class="col-sm-3 col-md-2 xs20">

            <ul class="t-menu">

               <li>

                  <a href="<?php echo site_url('csr');?>">CSR</a>
                  <?php /*
                  <ul class="h-menu" style="display:none;">

                     <li><a href="<?php echo site_url('csr');?>">2017</a></li>

                     <li><a href="<?php echo site_url('csr');?>">2016</a></li>

                  </ul>
                  */?>

               </li>

               <li>

                  <a href="<?php echo site_url('awards-recognitions');?>" class="active"><?php echo $this->lang->line('AwardsRecoginitions');?></a>

               </li>

               <?php /*
               <ul class="h-menu">

                 <?php foreach($content_year as $year):

                     $date = date_create($year['awards_start']);

                     $d = date_format($date,'Y');

                  ?>

                   <li><a class="<?php if($this->uri->segment(2) == $d) { echo 'active'; } ?>" href="<?php echo site_url('awards-recognitions/'.$d);?>"> <?php echo $d; ?></a></li>

                <?php endforeach; ?>

               </ul>
               */?>

               <li>

                  <a href="<?php echo site_url('sshe');?>"><?php echo $this->lang->line('SSHE');?></a>

               </li>

            </ul>

         </div>

         <div class="col-sm-9 col-md-10">

            <div class="bodytext mb30">

               <img src=" <?php echo base_url('images/awards/'.$result['awards_image']);?> "/><br/><br/>

               <p style="color: #1b1464; font-size: 20px;"><?php echo $result['awards_name']; ?></p>

               <?php

                  $date_create=date_create($result['awards_start']);

                  $date = date_format($date_create,'d M Y');

                ?>

               <p style="color: #00aef0; font-weight: bold; font-size: 18px;"><?php echo $date; ?></p><br/>

               <?php echo $result['awards_content']; ?>

            </div>

            <div class="mb50">

               <div class="inline-block v-middle">

                  <div class="t-share"><?php echo $this->lang->line('share');?> :</div>

               </div>

               <div class="inline-block v-middle custom-share">

                  <div class="addthis_inline_share_toolbox"></div>

               </div>

            </div>

            <?php if($other_content){ ?>
            <div class="title2"><?php echo $this->lang->line('other');?> <?php echo $this->lang->line('AwardsRecoginitions');?></div>

            <div class="row">

            <?php foreach($other_content as $oc): ?>

               <div class="resp-awards col-xs-6 col-md-4 col-lg-3 product-animated">

                  <div class="item-awards">

                        <a href="<?php echo site_url('awards-recognitions/'.$oc['seo_url']);?>">

                           <div class="h100">

                              <img src="<?php echo base_url('images/awards/thumb/'.$oc['awards_image_thumb']);?>" class="img-responsive"/>

                           </div>

                        <div class="in-awards"><?php echo $oc['awards_name']; ?></div>

                     </a>

                  </div>

               </div>

            <?php endforeach; ?>



            </div>
            <?php } ?>

         </div>

      </div>

   </div>

</div>



<script>

$(function() {

   $("ul.main-menu li a.nav-sustainable").addClass("current");



   var config = {

      scale      : 0.8,

      mobile     : true,

      origin   : "bottom",

      distance : "100px",

      duration : 1000,

      useDelay: 'onload',

      scale    : 1

   };

   window.sr = ScrollReveal(config);

   sr.reveal('.product-animated');

});

</script>

