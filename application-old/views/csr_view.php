
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
                   <li><a class="<?php if($this->uri->segment(3) == $d) {echo 'active'; } ?>" href="<?php echo site_url('csr/archive/'.$d);?>"> <?php echo $d; ?></a></li>
                <?php endforeach; ?>
               </ul>
               */?>
               <li>
                  <a href="<?php echo site_url('awards-recognitions');?>"><?php echo $this->lang->line('AwardsRecoginitions');?></a>
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
         <div class="col-sm-9">
         <?php foreach($list_csr as $item):
                $date = date_create($item['csr_start']);
          ?>
            <div class="news40">
               <a href="<?php echo site_url("csr/".$item['seo_url']);?>">
                  <div class="tbl">
                     <div class="cell l-news">
                        <div class="h165">
                           <?php if($item['csr_image_thumb'] != ''): ?>
                              <img src="<?php echo base_url();?>images/csr/thumb/<?php echo $item['csr_image_thumb']; ?>" class="img-responsive"/>
                           <?php else: ?>
                              <img src="<?php echo base_url();?>images/csr/default.jpg" class="img-responsive"/>
                           <?php endif; ?>
                        </div>
                     </div>
                     <?php /*
                     <div class="cell c-news">
                        <div class="inline-block">
                           <div class="t-day"><?php echo date_format($date,"d"); ?></div>
                        </div>
                        <div class="inline-block">
                           <div class="t-date"><?php echo date_format($date,"M"); ?> <br/><?php echo date_format($date,"Y"); ?></div>
                        </div>
                     </div>
                     */?>
                     <div class="cell r-news">
                        <div class="n-news"><?php echo $item['csr_name']; ?></div>
                        <p> <?php echo character_limiter(strip_tags($item['csr_content']), 250); ?></p>
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
            <?php /*
            <div class="news40">
               <a href="<?php echo site_url('csr_detail');?>">
                  <div class="tbl">
                     <div class="cell l-news">
                        <img src="<?php echo base_url('images/news/news02.jpg');?>" class="img-responsive"/>
                     </div>
                     <div class="cell c-news">
                        <div class="inline-block">
                           <div class="t-day">2</div>
                        </div>
                        <div class="inline-block">
                           <div class="t-date">May <br/>2017</div>
                        </div>
                     </div>
                     <div class="cell r-news">
                        <div class="n-news">Lorem ipsum dolor sit amet, consectetur adipis elit nullam. </div>
                        <p>eu expetenda adipiscing eam, vix diceret appetere dignissim et, eam corrumpit abhorreant no.</p>
                        <div class="read">Read More</div>
                     </div>
                  </div>
               </a>
            </div>
            <div class="news40">
               <a href="<?php echo site_url('csr_detail');?>">
                  <div class="tbl">
                     <div class="cell l-news">
                        <img src="<?php echo base_url('images/news/news03.jpg');?>" class="img-responsive"/>
                     </div>
                     <div class="cell c-news">
                        <div class="inline-block">
                           <div class="t-day">3</div>
                        </div>
                        <div class="inline-block">
                           <div class="t-date">May <br/>2017</div>
                        </div>
                     </div>
                     <div class="cell r-news">
                        <div class="n-news">Lorem ipsum dolor sit amet, consectetur adipis elit nullam. </div>
                        <p>eu expetenda adipiscing eam, vix diceret appetere dignissim et, eam corrumpit abhorreant no.</p>
                        <div class="read">Read More</div>
                     </div>
                  </div>
               </a>
            </div>
            <div class="news40">
               <a href="<?php echo site_url('csr_detail');?>">
                  <div class="tbl">
                     <div class="cell l-news">
                        <img src="<?php echo base_url('images/news/news02.jpg');?>" class="img-responsive"/>
                     </div>
                     <div class="cell c-news">
                        <div class="inline-block">
                           <div class="t-day">4</div>
                        </div>
                        <div class="inline-block">
                           <div class="t-date">May <br/>2017</div>
                        </div>
                     </div>
                     <div class="cell r-news">
                        <div class="n-news">Lorem ipsum dolor sit amet, consectetur adipis elit nullam. </div>
                        <p>eu expetenda adipiscing eam, vix diceret appetere dignissim et, eam corrumpit abhorreant no.</p>
                        <div class="read">Read More</div>
                     </div>
                  </div>
               </a>
            </div>
            <div class="news40">
               <a href="<?php echo site_url('csr_detail');?>">
                  <div class="tbl">
                     <div class="cell l-news">
                        <img src="<?php echo base_url('images/news/news01.jpg');?>" class="img-responsive"/>
                     </div>
                     <div class="cell c-news">
                        <div class="inline-block">
                           <div class="t-day">5</div>
                        </div>
                        <div class="inline-block">
                           <div class="t-date">May <br/>2017</div>
                        </div>
                     </div>
                     <div class="cell r-news">
                        <div class="n-news">Lorem ipsum dolor sit amet, consectetur adipis elit nullam. </div>
                        <p>eu expetenda adipiscing eam, vix diceret appetere dignissim et, eam corrumpit abhorreant no.</p>
                        <div class="read">Read More</div>
                     </div>
                  </div>
               </a>
            </div>
            <div class="news40">
               <a href="<?php echo site_url('csr_detail');?>">
                  <div class="tbl">
                     <div class="cell l-news">
                        <img src="<?php echo base_url('images/news/news03.jpg');?>" class="img-responsive"/>
                     </div>
                     <div class="cell c-news">
                        <div class="inline-block">
                           <div class="t-day">6</div>
                        </div>
                        <div class="inline-block">
                           <div class="t-date">May <br/>2017</div>
                        </div>
                     </div>
                     <div class="cell r-news">
                        <div class="n-news">Lorem ipsum dolor sit amet, consectetur adipis elit nullam. </div>
                        <p>eu expetenda adipiscing eam, vix diceret appetere dignissim et, eam corrumpit abhorreant no.</p>
                        <div class="read">Read More</div>
                     </div>
                  </div>
               </a>
            </div>
            */?>
         </div>
      </div>
   </div>
</div>

<script>
$(function() {
   $("ul.main-menu li a.nav-sustainable").addClass("current");
});
</script>
