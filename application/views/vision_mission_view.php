
<div class="pos-rel">
   <div class="bg-banner">
      <div class="container">
         <div class="title-banner"><?php //echo $this->lang->line('job');
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
                  <a href="<?php echo site_url('vision_mission');?>" class="active"><?php echo $this->lang->line('vision_mission');?></a>
               </li>
               <li><a href="http://www.pttep.com/en/Aboutpttep.aspx" target="_blank"><?php echo $this->lang->line('group');?></a></li>
               <li><a href="<?php echo site_url('contact');?>"><?php echo $this->lang->line('contact_us');?></a></li>
            </ul>
         </div>
         <div class="col-sm-9 col-md-10">
         <?php foreach ($visi as $item){?>
            <div class="box-vision">
               <img src="<?php echo base_url(),'/images/article/'.$item['article_image'] ?>"/>
               <div class="left-vision">
                  <div class="tbl">
                     <div class="cell">
                        <div class="nm-vision"><?php echo $item['article_head'];?></div>
                        <?php echo (limit_words($item['article_content'], 45));?>
                     </div>
                  </div>
               </div>
            </div>
         <?php } ?>
         <?php foreach ($misi as $item) :?>
          <div class="box-vision">
               <img src="<?php echo base_url(),'/images/article/'.$item['article_image'] ?>"/>
               <div class="right-vision">
                  <div class="tbl">
                     <div class="cell">
                        <div class="nm-vision"><?php echo $item['article_head'];?></div>
                        <?php echo (limit_words($item['article_content'], 45));?>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>

            <div class="t-vision"><?php echo $imgCorporate['article_name'];?></div>
            <div class="in-vision">
            <!-- Space gambar corporate -->
               <div class="logo-vision">
                  <img src="<?php echo base_url(),'/images/article/'. $imgCorporate['article_image'];?>" class="img-responsive"/>
               </div>     


            <!-- end space -->



























            <?php /* if($corporate):?>
               <?php foreach($corporate as $key => $item):?>
                  <?php if($key == 8 )  :?>
            <div class="logo-vision"><img src="<?php echo base_url(),'/images/corporate/'.$item['corporate_image']?>" class="img-responsive"/></div>
                  <?php endif; ?>
                  <?php endforeach ; ?>
               <ul class="l-vision">
               <?php foreach ($corporate as $key => $item) : ?>
                   <?php if($key <= 1 )  :?>
                  <li>
                     <div class="icon-vision"><img src=" <?php echo base_url(),'/images/corporate/'.$item['corporate_image'] ?> "/></div>
                     <div class="n-vision"><?php echo $item['corporate_content'];?></div>
                  </li>
                  <?php endif ;?>
                  <?php endforeach ; ?>
                  </ul>
               <ul class="l-vision blue">
                  <?php foreach ($corporate as $key => $item) : ?>
                   <?php if($key == 2 )  :?>
                  <li>
                     <div class="icon-vision"><img src=" <?php echo base_url(),'/images/corporate/'.$item['corporate_image'] ?> "/></div>
                     <div class="n-vision"><?php echo $item['corporate_content'];?></div>
                  </li>
                  <?php endif ;?>
                  <?php endforeach ; ?>
                   <?php foreach ($corporate as $key => $item) : ?>
                   <?php if($key == 3 )  :?>
                  <li>
                     <div class="icon-vision"><img src=" <?php echo base_url(),'/images/corporate/'.$item['corporate_image'] ?> "/></div>
                     <div class="n-vision"><?php echo $item['corporate_content'];?></div>
                  </li>
                  <?php endif ;?>
                  <?php endforeach ; ?>
                   <?php foreach ($corporate as $key => $item) : ?>
                   <?php if($key == 4 )  :?>
                  <li>
                     <div class="icon-vision"><img src=" <?php echo base_url(),'/images/corporate/'.$item['corporate_image'] ?> "/></div>
                     <div class="n-vision"><?php echo $item['corporate_content'];?></div>
                  </li>
                  <?php endif ;?>
                  <?php endforeach ; ?>
                   <?php foreach ($corporate as $key => $item) : ?>
                   <?php if($key == 5 )  :?>
                  <li>
                     <div class="icon-vision"><img src=" <?php echo base_url(),'/images/corporate/'.$item['corporate_image'] ?> "/></div>
                     <div class="n-vision"><?php echo $item['corporate_content'];?></div>
                  </li>
                  <?php endif ;?>
                  <?php endforeach ; ?>
                   <?php foreach ($corporate as $key => $item) : ?>
                   <?php if($key == 6 )  :?>
                  <li>
                     <div class="icon-vision"><img src=" <?php echo base_url(),'/images/corporate/'.$item['corporate_image'] ?> "/></div>
                     <div class="n-vision"><?php echo $item['corporate_content'];?></div>
                  </li>
                  <?php endif ;?>
                  <?php endforeach ; ?>
                   <?php foreach ($corporate as $key => $item) : ?>
                   <?php if($key == 7 )  :?>
                  <li>
                     <div class="icon-vision"><img src=" <?php echo base_url(),'/images/corporate/'.$item['corporate_image'] ?> "/></div>
                     <div class="n-vision"><?php echo $item['corporate_content'];?></div>
                  </li>
                  <?php endif ;?>
                  <?php endforeach ; ?>
                  <?php foreach ($corporate as $key => $item) : ?>
                   <?php if($key > 8 )  :?>
                  <li>
                     <div class="icon-vision"><img src=" <?php echo base_url(),'/images/corporate/'.$item['corporate_image'] ?> "/></div>
                     <div class="n-vision"><?php echo $item['corporate_content'];?></div>
                  </li>
                  <?php endif ;?>
                  <?php endforeach ; ?>
               <?php endif; */?>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
$(function() {
   $("ul.main-menu li a.nav-about").addClass("current");
});
</script>
