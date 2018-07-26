
<div id="h-index">
   <div id="home-banner" class="owl-carousel">
   <?php if($banner):?>


<?php foreach ($banner as $item) : ?>
      <div class="item">
         <div class="c-index">
            <div class="tbl">
               <div class="cell">
                  <div class="container">

                    <?php if($item['banner_caption'] != '' || $item['banner_heading'] != '') : ?>
                     <div class="box-banner">
                        <div class="t-banner"><?php echo $item['banner_heading']; ?></div>
                        <p><?php echo (limit_words($item['banner_caption'], 40));?></p>
                        <?php if($item['banner_link'] != '' ): ?>
                        <a href="<?php echo $item['banner_link'];?>"><button class="btn btn-read"><?php echo $this->lang->line('readmore');?></button></a>
                        <?php endif; ?>
                     </div>
                     <?php endif; ?>

                  </div>
               </div>
            </div>
         </div>
         <div>
            <img src="<?php echo base_url(),'/images/banner/'.$item['banner_image'] ?>" class="img-responsive"/>
         </div>
         <!--
         <div class="hidden-xs b-index" width="280px" style='background-image:URL("<?php //echo base_url(),'/images/banner/'.$item['banner_image'] ?>");'></div>-->
      </div>
<?php endforeach; ?>


<?php endif; ?>
   </div>
</div>


<!-- about -->
<div class="box-about">
<?php if($pttepindo):?>
    <?php foreach ($pttepindo as $key => $item) :?>
                  <?php if($key == 0): ?>
   <div class="tbl">
      <div class="cell l-about xs30">
         <div class="img-left"><img src="<?php echo base_url(),'/images/article/'.$item['article_image'] ?>" class="img-responsive"/></div>
      </div>
      <div class="cell r-about">
         <div class="t-about"><?php echo $item['article_head'];?></div>
         <?php echo $item['article_content'];?>
         <?php //echo limit_words($item['article_content'], 60);?>
            <?php //echo character_limiter($item['article_content'], 700); ?>
         <a href="http://lab.gositus.com/pttep/vision_mission " class="hvr-read"><div class="read"><?php echo $this->lang->line('readmore');?></div></a>
      </div>
   </div>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
</div>

<div class="content">
   <div class="container">
      <div class="title"><?php echo $this->lang->line('latestcsr');?></div>
      <div class="row">
      <?php foreach($other_content as $oc):
         $date=date_create($oc['csr_start']);
      ?>
         <div class="resp-awards col-xs-6 col-sm-4 item-news md40 product-animated">
            <a href="<?php echo site_url("news/".$oc['seo_url']);?>">
               <div>
                  <?php if($oc['csr_image'] != ''): ?>
                     <img src="<?php echo base_url();?>images/csr/<?php echo $oc['csr_image']; ?>" class="img-responsive"/>
                  <?php else: ?>
                     <img src="<?php echo base_url();?>images/csr/default.jpg " class="img-responsive"/>
                  <?php endif; ?>
               </div>
               <?php /*
               <div>
                  <div class="inline-block">
                     <div class="t-day"><?php echo date_format($date,"d"); ?></div>
                  </div>
                  <div class="inline-block">
                     <div class="t-date"><?php echo date_format($date,"M"); ?> <br/><?php echo date_format($date,"Y"); ?></div>
                  </div>
               </div>
               */?>
               <p><?php echo $oc['csr_name']; ?></p>
               <div class="read"><?php echo $this->lang->line('readmore');?></div>
            </a>
         </div>
      <?php endforeach; ?>
      </div>
   </div>
</div>

<?php /*
<div class="content">
   <div class="container">
      <div class="title"><?php echo $this->lang->line('latestnews');?></div>
      <div class="row">
      <?php foreach($other_content as $oc):
         $date=date_create($oc['news_start']);
      ?>
         <div class="resp-awards col-xs-6 col-sm-4 item-news md40 product-animated">
            <a href="<?php echo site_url("news/".$oc['seo_url']);?>">
               <div class="h240">
                  <?php if($oc['news_image'] != ''): ?>
                     <img src="<?php echo base_url();?>images/news/home/<?php echo $oc['news_image']; ?>" class="img-responsive"/>
                  <?php else: ?>
                     <img src="<?php echo base_url();?>images/news/default.jpg " class="img-responsive"/>
                  <?php endif; ?>
               </div>
               <div>
                  <div class="inline-block">
                     <div class="t-day"><?php echo date_format($date,"d"); ?></div>
                  </div>
                  <div class="inline-block">
                     <div class="t-date"><?php echo date_format($date,"M"); ?> <br/><?php echo date_format($date,"Y"); ?></div>
                  </div>
               </div>
               <p><?php echo character_limiter(strip_tags($oc['news_content']), 230); ?></p>
               <div class="read"><?php echo $this->lang->line('readmore');?></div>
            </a>
         </div>
      <?php endforeach; ?>
      </div>
   </div>
</div>

*/?>

<script>
$(document).ready(function(){
});
$(function() {
   $('#home-banner.owl-carousel').owlCarousel({
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem: true,
      autoPlay: false,
      pagination : false,
      paginationNumbers: false,
      navigation: true,
      navigationText: [ "", "" ],
   });

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

   $("ul.main-menu li a.nav-home").addClass("current");
});
</script>
