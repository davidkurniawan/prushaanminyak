

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

                  <a href="<?php echo site_url('csr');?>">CSR</a>

                  <?php /*
                  <ul class="h-menu" style="display:none;">

                     <li><a href="<?php echo site_url('csr');?>">2017</a></li>

                     <li><a href="<?php echo site_url('csr');?>">2016</a></li>

                  </ul>
                  */?>

               </li>

               <li>

                  <a href="<?php echo site_url('awards_recognitions');?>"><?php echo $this->lang->line('AwardsRecoginitions');?></a>
                  
                  <?php /*
                  <ul class="h-menu" style="display:none;">

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

                  <a class="active" href="<?php echo site_url('sshe');?>"><?php echo $this->lang->line('SSHE');?></a>

               </li>

            </ul>

         </div>

         <div class="col-sm-9 col-md-10">

            <div class="clearfix mb30">

               <div class="r-sshe" style="width: 100%;">



               <?php if($sshe):?>



               <?php foreach ($sshe as $key => $item) :?>

                  <?php if($key == 0): ?>


                  <div class="bodytext mb30">
                     <div style="float:left;width: 530px;margin: 0 20px 10px 0">
                        <img src="<?php echo base_url(),'/images/article/'.$item['article_image'] ?>" class="img-responsive mb20"/>
                     </div>
                     
                     <div class="title2" style="text-transform:none; margin-bottom: 10px;"><?php echo $item['article_head'];?></div>
                     <?php echo $item['article_content']?>

                  </div>

               </div>



               <!-- <div class="l-sshe"> -->


               <?php endif; ?>

               <?php endforeach; ?>



               <?php foreach ($sshe as $key => $item) :?>

                  <?php if($key == 1): ?>


                  <?php if($item['article_image']){ ?>
                  <img src=" <?php echo base_url(),'/images/article/'.$item['article_image'] ?> " class="img-responsive"/>
                  <?php } ?>
               <!-- </div> -->

            </div>



            <div class="title2" style="text-transform:none; margin-bottom: 10px;"><?php echo $item['article_head'];?></div>

            <div class="bodytext mb30">

            <?php echo $item['article_content'];?>

            </div>

            <?php endif; ?>

               <?php endforeach; ?>



            <?php foreach ($sshe as $key => $item) :?>

                  <?php if($key == 2): ?>

            <div class="title2" style="text-transform:none; margin-bottom: 10px;"><?php echo $item['article_head'];?></div>

            <div class="bodytext mb30">

               <?php echo $item['article_content'];?>

            </div>

            <?php endif; ?>

            <?php endforeach; ?>



                  <?php foreach ($sshe as $key => $item) :?>

                  <?php if($key == 3): ?>

            <div class="title2" style="text-transform:none; margin-bottom: 10px;"><?php echo $item['article_head'];?></div>

            <div class="bodytext mb30">

              <?php echo $item['article_content'];?>

            </div>

             <?php endif; ?>

               <?php endforeach; ?>

            <?php endif; ?>



            <div class="mb50">

               <div class="inline-block v-middle">

                  <div class="t-share"><?php echo $this->lang->line('share');?>:</div>

               </div>

               <div class="inline-block v-middle custom-share">

                  <div class="addthis_inline_share_toolbox"></div>

               </div>

            </div>

            <?php if ($document): ?>

            <div class="title2"><?php echo $this->lang->line('relateddocument');?></div>

            <div class="row">

               <?php foreach ($document as $key => $item) :

               $date = date_create($item['relateddocument_start']);?>

                  <?php if($key >= 0 ): ?>

               <div class="resp-awards col-xs-6 col-lg-3 product-animated">

                  <div class="item-sshe">



                     <div class="resp-left">

                        <div class="h200">

                           <img src="<?php echo base_url(),'/images/relateddocument/'.$item['relateddocument_image']?>" class="img-responsive"/>

                        </div>

                     </div>

                     <div class="resp-right">

                        <div>

                           <div class="inline-block">

                              <div class="s-day"><?php echo date_format($date,"d"); ?></div>

                           </div>

                           <div class="inline-block">

                              <div class="s-date"><?php echo date_format($date,"M"); ?><br/><?php echo date_format($date,"Y"); ?></div>

                           </div>

                        </div>

                        <?php echo $item['relateddocument_content'];?>

                        <a href="<?php echo base_url(),'/images/relateddocument/'.$item['relateddocument_doc']?>" download><div class="i-download"><?php echo $this->lang->line('download');?></div></a>

                     </div>



                  </div>

               </div>

                <?php endif ;?>

                     <?php endforeach ;?>

                     <?php endif ;?>



            </div>

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

