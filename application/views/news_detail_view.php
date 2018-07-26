<style type="text/css">

   .mb30 {

    margin-bottom: 15px;

}

</style>

<div class="pos-rel">

   <div class="bg-banner">

      <div class="container">

         <div class="title-banner"><?php ///cho $this->lang->line('news&media');

         echo $banner['banner_name']; ?></div>

      </div>

   </div>

   <div class="img-banner" style="background:url('<?php echo base_url('images/banner/'.$banner['banner_image']);?>') no-repeat center 0;width:100%;"></div>

</div>



<div class="content">

   <div class="container">

      <div class="row">

         <div class="col-sm-3 col-md-2 xs20">

            <ul class="t-menu">

               <li>

                  <a href="<?php echo site_url('news');?>" class="active"><?php echo $this->lang->line('News');?></a>

               </li>

               <ul class="h-menu">

               <!-- get news year -->

               <?php foreach($content_year as $year):

                  $date = date_create($year['news_start']);

                  $d = date_format($date,'Y');

               ?>

                  <li><a href="<?php echo site_url('news/archive/'.$d);?>"> <?php echo $d; ?></a></li>

                <?php endforeach; ?>

               </ul>

               <li><a href="<?php echo site_url('publications');?>"><?php echo $this->lang->line('Publications');?></a></li>

               <li><a href="<?php echo site_url('video');?>">Video</a></li>

            </ul>

         </div>

         <div class="col-sm-9 col-md-10">

            <div class="bodytext  mb30">
               <div class="slide-multiple">
                  <div class="item-multiple">

                     <?php if($result['news_image'] != ''): ?>

                        <img src=" <?php echo base_url('images/news/'.$result['news_image']);?> "/><br/><br/>

                     <?php else: ?>

                        <img src=" <?php echo base_url('images/news/default.jpg');?> "/><br/><br/>

                     <?php endif; ?>
                  </div>

                  <?php
                     if(!empty($list_slide)){
                        foreach ($list_slide as $key => $value) {
                           ?>
                              <div class="item-multiple">
                                 <img src="<?php echo base_url('images/news/slide/'.$value['news_multiple_name']);?>" alt="<?php echo $result['news_name']; ?>">    
                              </div>
                           <?php
                        }
                     }
                  ?>

               </div>

               <p style="color: #1b1464; font-size: 26px;margin: 0 0 8px"><?php echo $result['news_name']; ?></p>

               <?php

                  $date_create=date_create($result['news_start']);

                  $date = date_format($date_create,'d M Y');

                ?>

               <p style="color: #00aef0; font-size: 16px;"><?php echo $date; ?></p><br/>

               <p><?php echo nl2br($result['news_content']); ?></p>

            </div>

            <div class="mb50">

               <div class="inline-block v-middle">

                  <div class="t-share"><?php echo $this->lang->line('share');?> :</div>

               </div>

               <div class="inline-block v-middle custom-share">

                  <div class="addthis_inline_share_toolbox"></div>

               </div>

            </div>



            <?php

            if($other_content):?>

            <div class="title2"><?php echo $this->lang->line('othernews');?></div>

            <div class="row">



            <?php

                  foreach($other_content as $row):

                  $date_create_other=date_create($row['news_start']);

                  $d = date_format($date_create_other,'d');

                  $m = date_format($date_create_other,'M');

                  $y = date_format($date_create_other,'Y');



             ?>

               <div class="resp-awards col-xs-6 col-md-4 item-news md40 product-animated">

                  <a href="<?php echo site_url('news/'.$row['seo_url']);?>">

                     <div class="h190">

                        <img src="<?php echo base_url('images/news/'.$row['news_image']);?>" class="img-responsive"/>

                     </div>

                     <div>

                        <div class="inline-block">

                           <div class="t-day"><?php echo $d; ?></div>

                        </div>

                        <div class="inline-block">

                           <div class="t-date"><?php echo $m; ?> <br/><?php echo $y ?></div>

                        </div>

                     </div>

                     <p><?php echo character_limiter(strip_tags($row['news_content']), 230); ?></p>

                     <div class="read"><?php echo $this->lang->line('readmore');?></div>

                  </a>

               </div>

            <?php

               endforeach; ?>

             </div>



               <?php

               endif;

             ?>

            </div>

            <?php /* ?>

               <div class="col-sm-4 item-news xs40 product-animated">

                  <a href="<?php echo site_url('news_detail');?>">

                     <img src="<?php echo base_url('images/news/news02.jpg');?>" class="img-responsive"/>

                     <div>

                        <div class="inline-block">

                           <div class="t-day">5</div>

                        </div>

                        <div class="inline-block">

                           <div class="t-date">May <br/>2017</div>

                        </div>

                     </div>

                     <p>Lorem ipsum dolor sit amet, consectetur adipis elit. Nullam eu ligula sapien.</p>

                     <div class="read">Read More</div>

                  </a>

               </div>

               <div class="col-sm-4 item-news product-animated">

                  <a href="<?php echo site_url('news_detail');?>">

                     <img src="<?php echo base_url('images/news/news03.jpg');?>" class="img-responsive"/>

                     <div>

                        <div class="inline-block">

                           <div class="t-day">5</div>

                        </div>

                        <div class="inline-block">

                           <div class="t-date">May <br/>2017</div>

                        </div>

                     </div>

                     <p>Lorem ipsum dolor sit amet, consectetur adipis elit. Nullam eu ligula sapien.</p>

                     <div class="read">Read More</div>

                  </a>

               </div>

               */?>

            </div>



         </div>

      </div>

   </div>

</div>





<script>

$(function() {

   $('.slide-multiple').slick({
      dots: false,
      arrows: true,
      prevArrow: '<div class="arr arr-left"><i class="fa fa-angle-left"></i></div>',
      nextArrow: '<div class="arr arr-right"><i class="fa fa-angle-right"></i></div>'
   });

   $("ul.main-menu li a.nav-news").addClass("current");



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

