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
                  <a href="<?php echo site_url('news');?>"><?php echo $this->lang->line('News');?></a>
                  <ul class="h-menu" style="display: none;">
                  <!-- get news year -->
                     <?php foreach($news_year as $year):
                        $date = date_create($year['news_start']);
                     ?>
                     <li><a href="<?php echo site_url('news');?>"> <?php echo date_format($date,'Y'); ?></a></li>
                     <?php endforeach; ?>
                  </ul>
               </li>
               <li><a href="<?php echo site_url('publications');?>"><?php echo $this->lang->line('Publications');?></a></li>
               <li><a href="<?php echo site_url('video');?>" class="active">Video</a></li>
            </ul>
         </div>
         <div class="col-sm-9">
         <?php foreach($video as $item ):?>
            <div class="bdr-video">
               <div class="title2" style="text-transform: none;"><?php echo $item['video_name'];?></div>
               <iframe class="video" src="https://www.youtube.com/embed/<?php echo $item['video_link']; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
          <?php endforeach ; ?>
         </div>
      </div>
   </div>
</div>

<script>
$(function() {
   $("ul.main-menu li a.nav-news").addClass("current");
});
</script>
