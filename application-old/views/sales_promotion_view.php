
<div class="pos-rel">
   <div class="bg-banner">
      <div class="container">
         <div class="title-banner"><?php echo $this->lang->line('news&media');?></div>
      </div>
   </div>
   <div class="img-banner" style="background:url('<?php echo base_url('images/banner/banner-news.jpg');?>') no-repeat center 0;width:100%;"></div>
</div>

<div class="content">
   <div class="container">
      <div class="row">
         <div class="col-sm-3 col-md-2 xs20">
            <ul class="t-menu">
               <li>
                  <a href="<?php echo site_url('news');?>" class="active"><?php echo $this->lang->line('News');?></a>
                  <ul class="h-menu">
                     <li><a href="<?php echo site_url('news');?>">2017</a></li>
                     <li><a href="<?php echo site_url('news');?>">2016</a></li>
                  </ul>
               </li>
               <li><a href="<?php echo site_url('news');?>"><?php echo $this->lang->line('Publications');?></a></li>
               <li><a href="<?php echo site_url('news');?>">Video</a></li>
            </ul>
         </div>
         <div class="col-sm-9 col-md-10">
            <div class="bodytext mb30">
               <img src=" <?php echo base_url('images/article/detail01.jpg');?> "/><br/><br/>
               <p style="color: #1b1464; font-size: 20px;">Lorem ipsum dolor sit amet, consectetur adipis elit nullam.</p>
               <p style="color: #00aef0; font-weight: bold; font-size: 18px;">7 May 2017</p><br/>
               <p>Lorem ipsum dolor sit amet, democritum scripserit sed cu, option phaedrum vix ut. In meliore ex petendis mediocritatem cum, nec ad lucilius accusamus interpretaris, labore eruditi ei mea. Vim doctus discere fabellas id, utroque necessitatibus in his. Has in iisque referrentur. An quot illud ludus vel.</p><br/>
               <p>Eu expetenda adipiscing eam, vix diceret appetere dignissim et, eam corrumpit abhorreant no. As sum recusabo imperdiet ex per, an assum clita detracto eam, pri cu ignota veritus maluisset. Mei cu quod ferri minim. No vis omnis lucilius intellegam, congue intellegebat sea at, pro ex oporteat tincidunt cotidieque. His id nullam tritani deseruisse, ut mel debitis delicata vulputate.</p><br/>
               <p>Lorem ipsum dolor sit amet, democritum scripserit sed cu, option phaedrum vix ut. In meliore ex petendis mediocritatem cum, nec ad lucilius accusamus interpretaris, labore eruditi ei mea. Vim doctus discere fabellas id, utroque necessitatibus in his. Has in iisque referrentur. An quot illud ludus vel.</p><br/>
               <p>Eu expetenda adipiscing eam, vix diceret appetere dignissim et, eam corrumpit abhorreant no. As sum recusabo imperdiet ex per, an assum clita detracto eam, pri cu ignota veritus maluisset. Mei cu quod ferri minim.</p>
            </div>
            <div class="mb50">
               <div class="inline-block v-middle">
                  <div class="t-share"><?php echo $this->lang->line('share');?> :</div>
               </div>
               <div class="inline-block v-middle custom-share">
                  <div class="addthis_inline_share_toolbox"></div>
               </div>
            </div>
            <div class="title2"><?php echo $this->lang->line('othernews');?></div>
            <div class="row">
               <div class="col-sm-4 item-news xs40 product-animated">
                  <a href="<?php echo site_url('news_detail');?>">
                     <img src="<?php echo base_url('images/news/news01.jpg');?>" class="img-responsive"/>
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
                     <div class="read"><?php echo $this->lang->line('readmore');?></div>
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
                     <div class="read"><?php echo $this->lang->line('readmore');?></div>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
$(function() {
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
