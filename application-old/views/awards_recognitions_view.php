
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
                  <a href="<?php echo site_url('awards-recognitions');?>" class="<?php if($this->uri->segment(1) == 'awards_recognitions' && $this->uri->segment(2) == ''){ echo 'active'; } ?>"><?php echo $this->lang->line('AwardsRecoginitions');?></a>
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
         <div class="col-sm-9">
            <!-- box atas -->
            <div class="clearfix bdr-awards">
               <div class="pull-left">
                  <div class="h28">
                     <div class="tbl">
                        <div class="cell">
                           <div class="t-awards"><?php echo ($count_content)? $count_content : ''; ?> <?php echo $this->lang->line('Penghargaan');?></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pull-right">
                  <div class="d-awards">
                  <?php if($this->uri->segment(2) == '') {
                       echo $this->lang->line('awards');
                     } else {
                        echo $this->uri->segment(2);
                  } ?>
                  </div>
               </div>
            </div>
            <!-- end box -->

            <div class="box-awards">
            <?php if($check_row < 1){ echo 'No content';} ?>
            <div class="row">
            <?php foreach($list_awards as $item): ?>
                  <div class="resp-awards col-xs-6 col-md-4 col-lg-3 product-animated">
                     <div class="item-awards">
                        <a href="<?php echo site_url('awards-recognitions/'.$item['seo_url']);?>">
                           <div class="h100">
                              <img src="<?php echo base_url('images/awards/thumb/'.$item['awards_image_thumb']);?>" class="img-responsive"/>
                           </div>
                           <div class="in-awards"><?php echo $item['awards_name']; ?></div>
                        </a>
                     </div>
                  </div>
            <?php endforeach; ?>
            </div>
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
