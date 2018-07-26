
<div class="box-site">
   <div class="container">
      <div class="txt-site"><span><?php echo $this->lang->line('sitemap');?></span></div>
   </div>
</div>
<div class="site-toggle">
   <div class="container">
      <div class="list-site">
         <div class="inline-block mr40 mb30">
            <a href="<?php echo site_url('/');?>"><?php echo $this->lang->line('home');?></a>
         </div>
         <div class="inline-block mr40 mb30">
            <a href="<?php echo site_url('vision_mission');?>"><?php echo $this->lang->line('about_us');?></a>
            <ul class="l-site">
               <li><a href="<?php echo site_url('vision_mission');?>"><?php echo $this->lang->line('vision_mission');?></a></li>
               <li><a href="http://www.pttep.com/en/Aboutpttep.aspx" target="_blank"><?php echo $this->lang->line('group');?></a></li>
               <li><a href="<?php echo site_url('contact');?>"><?php echo $this->lang->line('contact_us');?></a></li>
            </ul>
         </div>
         <div class="inline-block mr40 mb30">
            <a href="<?php echo site_url('our_business');?>"><?php echo $this->lang->line('ourbussines');?></a>
         </div>
         <div class="inline-block mr40 mb30">
            <a href="<?php echo site_url('csr');?>"><?php echo $this->lang->line('sustainable_development');?></a>
            <ul class="l-site">
               <li><a href="<?php echo site_url('csr');?>">CSR</a></li>
               <li><a href="<?php echo site_url('awards-recognitions');?>"><?php echo $this->lang->line('AwardsRecoginitions');?></a></li>
               <li><a href="<?php echo site_url('sshe');?>"><?php echo $this->lang->line('SSHE');?></a></li>
            </ul>
         </div>
         <div class="inline-block mr40">
            <a href="<?php echo site_url('news');?>"><?php echo $this->lang->line('news&media');?></a>
            <ul class="l-site">
               <li><a href="<?php echo site_url('news');?>"><?php echo $this->lang->line('News');?></a></li>
               <li><a href="<?php echo site_url('publications');?>"><?php echo $this->lang->line('Publications');?></a></li>
               <li><a href="<?php echo site_url('video');?>">Video</a></li>
            </ul>
         </div>
         <div class="inline-block">
            <a href="<?php echo site_url('working');?>"><?php echo $this->lang->line('career');?></a>
            <ul class="l-site">
               <li><a href="<?php echo site_url('working');?>"><?php echo $this->lang->line('working');?></a></li>
               <li><a href="<?php echo site_url('job_vacancy');?>"><?php echo $this->lang->line('job');?></a></li>
            </ul>
         </div>
      </div>
   </div>
</div>

<footer>
   <div class="footer-top">
      <div class="i-footer"><img src=" <?php echo base_url('images/icons/footer.png');?> "/></div>
      <div class="container">
         <div class="row">
            <div class="col-sm-2 xs30"><img src=" <?php echo base_url('images/logo-footer.png');?> "/></div>
            <div class="col-sm-5 col-md-3 xs30">
               <div class="t-footer"><?php echo $web['setting_name'];?></div>
               <p style="margin-right:40px;"><?php echo $web['setting_address'];?> <?php echo $web['setting_postcode'];?></p>
            </div>
            <div class="col-sm-4 col-md-offset-1 c-footer">
               <div class="mb10">
                  <div class="inline-block mr15"><img src=" <?php echo base_url('images/icons/phone.png');?> "/></div>
                  <div class="inline-block"><?php echo $this->lang->line('phone');?> : <a href="tel:<?php echo $web['setting_phone'];?>"><?php echo $web['setting_phone'];?></a></div>
               </div>
               <div>
                  <div class="inline-block mr15"><img src=" <?php echo base_url('images/icons/fax.png');?> "/></div>
                  <div class="inline-block">Fax : <a href="tel:<?php echo $web['setting_fax'];?>"><?php echo $web['setting_fax'];?></a></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="footer-bottom">
      <div class="container">
         <div class="row">
            <div class="col-sm-3">
               <div class="toc">
                  <a href="<?php echo site_url('terms-and-conditions');?>"><?php echo $this->lang->line('toc');?></a>
               </div>
            </div>
            <div class="col-sm-7">
               <div><?php echo $this->lang->line('situs');?>  </div>
               <div><?php echo $this->lang->line('situs2');?></div>

            </div>
            <div class="col-sm-2">
               <a id="copyright-gositus" target="_blank" href="http://www.gositus.com" title="Jasa Pembuatan Website"><span>Gositus</span></a>
            </div>
         </div>
      </div>
   </div>
</footer>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-592bce46b3654438"></script>

<?php if ($web['setting_google_analytics']) : ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?=$web['setting_google_analytics']?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php endif; ?>
</body>
</html>
