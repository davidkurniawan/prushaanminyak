
<div class="pos-rel">
   <div class="bg-banner">
      <div class="container">
         <div class="title-banner">Our Business</div>
      </div>
   </div>
   <div class="img-banner" style="background:url('<?php echo base_url('images/banner/banner-our.jpg');?>') no-repeat center 0;width:100%;"></div>
</div>


<div class="t-our">
   <div class="container">FEATURED EXPLORATION <span style="color: #a6cf39;">AND PRODUCTION</span></div>
</div>
<div class="in-feat">
   <div class="container">
      <div class="tbl">
         <div class="cell w250 xs30">
            <div class="t-feat">Phase</div>
            <ul class="l-feat">
               <li>
                  <img src=" <?php echo base_url('images/our/feat01.png');?>" class="img-responsive"/>
                  <div class="w-feat">Production</div>
               </li>
               <li>
                  <img src=" <?php echo base_url('images/our/feat02.png');?>" class="img-responsive"/>
                  <div class="w-feat">Development</div>
               </li>
               <li>
                  <img src=" <?php echo base_url('images/our/feat03.png');?>" class="img-responsive"/>
                  <div class="w-feat">Exploration</div>
               </li>
            </ul>
            <div class="bdr-feat"></div>
            <div class="t-feat">Investment Type</div>
            <ul class="l-feat">
               <li>
                  <img src=" <?php echo base_url('images/our/feat04.png');?>" class="img-responsive"/>
                  <div class="w-feat">PPTEP as <br/>Operator</div>
               </li>
               <li>
                  <img src=" <?php echo base_url('images/our/feat05.png');?>" class="img-responsive"/>
                  <div class="w-feat">PPTEP as Joint <br/>Venture Partner</div>
               </li>
               <li>
                  <img src=" <?php echo base_url('images/our/feat06.png');?>" class="img-responsive"/>
                  <div class="w-feat">PPTEP as Joint <br/>Operator</div>
               </li>
            </ul>
            <div class="a-feat">
               <div class="inline-block" style="margin-right: 25px;">
                  <a href="#">
                     <div class="i-high">Highlights</div>
                  </a>
               </div>
               <div class="inline-block">
                  <a href="#">
                     <div class="i-more">More Projects</div>
                  </a>
               </div>
            </div>
         </div>
         <div class="cell">
            <div class="a-feat text-right">
               <a href="#">
                  <div class="i-list">View List</div>
               </a>
            </div>
            <img src=" <?php echo base_url('images/our/map.png');?>" class="img-responsive" style="width:100%;"/>
         </div>
      </div>
   </div>
</div>

<div class="content mb30">
 <?php if($ourbussines ): ?>
      <?php foreach ($ourbussines as $key => $item) :?>
      <?php if($key == 9):?>
   <div class="container">
      <div class="tbl mb30">
         <div class="cell">

            <div class="img-our">

               <img src="<?php echo base_url(),'/images/article/'.$item['article_image'] ?>" class="img-responsive"/>
            </div>
         </div>
         <div class="cell in-our"><?php echo $item['article_head']?></div>
      </div>
      <div class="bodytext justify">
         <?php echo $item['article_content'];?>
      </div>
       <?php endif ; ?>
    <?php endforeach ; ?>
    <?php endif ; ?>
   </div>
   <div class="contentBusinessUnitDetail">
      <div class="detailHistory detailHistory-slider">
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">1985</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">1988</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">1991</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">1993</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">1994</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">1995</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">1997</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">1998</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">2001</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">2002</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">2003</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">2004</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">2007</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">2008</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">2009</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his">2010</div>
                  <div class="w-his">
                     <ul>
                        <li>PTTEP became operator of Bongkot, the largest field in the Gulf of Thailand.</li>
                        <li>PTTEP began the exploration activities under Arthit Project.</li>
                        <li>PTTEP won an outstanding industry award for safety management, presented by the Ministry of Industry.</li>
                     </ul>
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/our/his01.jpg');?>" class="img-responsive"/>
               </div>
            </div>
         </div>
      </div>
      <div class="listYear">
         <ul>
            <li><a href="javascript:;">1985</a></li>
            <li><a href="javascript:;">1988</a></li>
            <li><a href="javascript:;">1991</a></li>
            <li><a href="javascript:;">1993</a></li>
            <li><a href="javascript:;">1994</a></li>
            <li><a href="javascript:;">1995</a></li>
            <li><a href="javascript:;">1997</a></li>
            <li><a href="javascript:;">1998</a></li>
            <li><a href="javascript:;">2001</a></li>
            <li><a href="javascript:;">2002</a></li>
            <li><a href="javascript:;">2003</a></li>
            <li><a href="javascript:;">2004</a></li>
            <li><a href="javascript:;">2007</a></li>
            <li><a href="javascript:;">2008</a></li>
            <li><a href="javascript:;">2009</a></li>
            <li><a href="javascript:;">2010</a></li>
         </ul>
      </div>
      <div class="arrowSlider">
           <div class="prevArrow"></div>
      </div>
      <div class="arrowSlider">
           <div class="nextArrow"></div>
      </div>
   </div>
   <div class="arrow-active">
      <img src=" <?php echo base_url('images/icons/arrow-timeline.png');?>" class="img-responsive"/>
   </div>
</div>

<script>
$(function() {
   $("ul.main-menu li a.nav-our").addClass("current");
   $('.listYear ul').slick({
      dots: false,
      arrows:false,
      focusOnSelect: true,
      infinite: true,
      slidesToShow: 15,
      slidesToScroll: 1,
      centerMode: true,
      asNavFor: '.detailHistory-slider',
      responsive: [
         {
         breakpoint: 992,
            settings: {
            slidesToShow: 9,
            }
         },
         {
         breakpoint: 768,
            settings: {
            slidesToShow: 3,
            slidesToScroll: 1
            }
         }
         ,
         {
         breakpoint: 480,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            }
         }
      ]
   });

   $('.detailHistory-slider').slick({
      slidesToShow: 1,
      arrows: true,
      asNavFor: '.listYear ul',
      prevArrow: $(".arrowSlider:first"),
      nextArrow: $(".arrowSlider:last")
   });

});
</script>
