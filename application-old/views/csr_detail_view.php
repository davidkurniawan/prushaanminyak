
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
<div class="content">
   <div class="container">
      <div class="row">
         <div class="col-sm-3 col-md-2 xs20">
            <ul class="t-menu">
               <li>
                  <a href="<?php echo site_url('csr');?>" class="active">CSR</a>
               </li>
               <?php /*
               <ul class="h-menu">
                  <?php foreach($content_year as $year):
                              $date = date_create($year['csr_start']);
                              $d = date_format($date,'Y');
                  ?>
                  <li><a href="<?php echo site_url('csr/archive/'.$d);?>"> <?php echo $d; ?></a></li>
                <?php endforeach; ?>
               </ul>
               */?>
               <li>
                  <a href="<?php echo site_url('awards_recognitions');?>"><?php echo $this->lang->line('AwardsRecoginitions');?></a>
                  <?php /*
                  <ul class="h-menu" style="display: none;">
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2017</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2016</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2015</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2014</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2013</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2012</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2011</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2010</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2009</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2008</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2007</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2006</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2005</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2004</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2003</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2002</a></li>
                     <li><a href="<?php echo site_url('awards_recognitions');?>">2001</a></li>
                  </ul>
                  */?>
               </li>
               <li>
                  <a href="<?php echo site_url('sshe');?>"><?php echo $this->lang->line('SSHE');?></a>
               </li>
            </ul>
         </div>
         <div class="col-sm-9 col-md-10">
            <div class="bodytext mb30">
               <div class="slide-multiple">
                  <div class="item-multiple">
                      <?php if($result['csr_image'] != ''): ?>
                        <img src=" <?php echo base_url('images/csr/'.$result['csr_image']);?> "/><br/><br/>
                     <?php else: ?>
                        <img src=" <?php echo base_url('images/news/default.jpg');?> "/><br/><br/>
                     <?php endif; ?>
                  </div>
                  <?php
                     if(!empty($list_slide)){
                        foreach ($list_slide as $key => $value) {
                           ?>
                              <div class="item-multiple">
                                 <img src="<?php echo base_url('images/csr/slide/'.$value['csr_multiple_name']);?>" alt="<?php echo $result['csr_name']; ?>">    
                              </div>
                           <?php
                        }
                     }
                  ?>
               </div>
               <p style="color: #1b1464; font-size: 26px;margin: 0 0 8px"><?php echo $result['csr_name']; ?></p>
               <?php
                  $date_create=date_create($result['csr_start']);
                  $date = date_format($date_create,'d M Y');
                ?>
                <?php /*
               <p style="color: #00aef0; font-size: 16px;"><?php echo $date; ?></p><br/>
               */?>
               <?php echo $result['csr_content']; ?>
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
            <div class="title2"><?php echo $this->lang->line('other');?> CSR</div>
            <div class="row">
            <?php
                   foreach($other_content as $row):
                   $date_create_other=date_create($result['csr_start']);
             ?>
               <div class="resp-awards col-xs-6 col-md-4 item-news sm40 product-animated">
                  <a href="<?php echo site_url('csr/'.$row['seo_url']);?>">
                     <div class="h190">
                        <img src="<?php echo base_url('images/csr/'.$row['csr_image']);?>" class="img-responsive"/>
                     </div>
                     <div>
                        <div class="inline-block">
                           <div class="t-day"><?php echo date_format($date_create_other,'d'); ?></div>
                        </div>
                        <div class="inline-block">
                           <div class="t-date"><?php echo date_format($date_create_other,'M'); ?> <br/><?php echo date_format($date_create_other,'Y'); ?></div>
                        </div>
                     </div>
                     <p><?php echo character_limiter(strip_tags($row['csr_content']), 230); ?></p>
                     <div class="read"><?php echo $this->lang->line('readmore');?></div>
                  </a>
               </div>

            <?php
               endforeach;
               ?>

               </div>
               <?php
               endif;
             ?>

            </div> <!-- /row-->

               <?php /*
                <div class="col-sm-4 item-news xs40 product-animated">
                  <a href="<?php echo site_url('csr_detail');?>">
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
                  <a href="<?php echo site_url('csr_detail');?>">
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
               */ ?>
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
