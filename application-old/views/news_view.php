
<div class="pos-rel">
   <div class="bg-banner">
      <div class="container">
         <div class="title-banner"><?php ///cho $this->lang->line('news&media');
         echo $banner['banner_heading']; ?></div>
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
                  <li><a class="<?php if($this->uri->segment(3) == $d) {echo 'active'; } ?>" href="<?php echo site_url('news/archive/'.$d);?>"> <?php echo $d; ?></a></li>
                <?php endforeach; ?>
               </ul>
               <li><a href="<?php echo site_url('publications');?>"><?php echo $this->lang->line('Publications');?></a></li>
               <li><a href="<?php echo site_url('video');?>">Video</a></li>
            </ul>
         </div>
         <div class="col-sm-9">

         <?php foreach($list_news as $item):
            $date=date_create($item['news_start']);
         ?>
            <div class="news40">
               <a href="<?php echo site_url("news/".$item['seo_url']);?>">
                  <div class="tbl">
                     <div class="cell l-news">
                        <div class="h165">
                           <?php if($item['news_image_thumb'] != ''): ?>
                              <img src="<?php echo base_url();?>images/news/thumb/<?php echo $item['news_image_thumb']; ?>" class="img-responsive"/>
                           <?php else: ?>
                              <img src="<?php echo base_url();?>images/news/default.jpg" class="img-responsive"/>
                           <?php endif; ?>
                        </div>
                     </div>
                     <div class="cell c-news">
                        <div class="inline-block">
                           <div class="t-day"><?php echo date_format($date,"d"); ?></div>
                        </div>
                        <div class="inline-block">
                           <div class="t-date"><?php echo date_format($date,"M"); ?> <br/><?php echo date_format($date,"Y"); ?></div>
                        </div>
                     </div>
                     <div class="cell r-news">
                        <div class="n-news"><?php echo $item['news_name']; ?></div>
                        <p> <?php echo character_limiter(strip_tags($item['news_content']), 180); ?></p>
                        <div class="read"><?php echo $this->lang->line('readmore');?></div>
                     </div>
                  </div>
               </a>
            </div>
         <?php endforeach; ?>
            <div class="text-center">
               <div class="pagination">
                  <?php if(isset($page)){
                     echo $page; }?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
$(function() {
   $("ul.main-menu li a.nav-news").addClass("current");
});
</script>
