
<div class="pos-rel">
   <div class="bg-banner">
      <div class="container">
         <div class="title-banner"><?php //echo $this->lang->line('working');
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
               <li><a href="<?php echo site_url('working');?>" class="active"><?php echo $this->lang->line('working');?></a></li>
               <li><a href="<?php echo site_url('job-vacancy');?>"><?php echo $this->lang->line('job');?></a></li>
            </ul>
         </div>
         <div class="col-sm-9">
            <div class="row">
               <?php if($content['article_image']){ ?><div class="col-sm-6 mb30"><img src="<?php echo base_url('images/article/'.$content['article_image']);?>" class="img-responsive"/></div><?php } ?>
            </div>
            <div class="title" style="text-transform: none; margin-bottom: 10px;"><?php echo $content['article_head']; ?></div>
            <div class="bodytext mb30">
               <p><?php echo $content['article_content']; ?></p>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
$(function() {
   $("ul.main-menu li a.nav-career").addClass("current");
});
</script>
