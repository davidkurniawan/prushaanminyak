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


<div class="t-our">
   <div class="container"><?php echo $this->lang->line('featuredexploration'); ?> <span style="color: #a6cf39;"><?php echo $this->lang->line('featuredexploration2'); ?></span></div>
</div>
<div class="in-feat">
   <div class="container">
      <div class="tbl">
         <?php /*
         <div class="cell w250 xs30">
            <div class="t-feat"><?php echo $this->lang->line('phase');?></div>
            <ul class="l-feat">
            <!-- loop -->
            <?php foreach($phase as $rowPhase): ?>
               <li>
                  <img src=" <?php echo base_url('images/business/phase/'.$rowPhase['phase_image']);?>" class="img-responsive"/>
                  <div class="w-feat"><?php echo $rowPhase['phase_name']; ?></div>
               </li>
            <?php endforeach; ?>
            <!-- end loop -->
            </ul>
            <div class="bdr-feat"></div>
            <div class="t-feat"><?php echo $this->lang->line('investment');?></div>
            <ul class="l-feat">
            <?php foreach($investment as $rowInvest): ?>
               <li>
                  <img src=" <?php echo base_url('images/business/investment/'.$rowInvest['investment_image']);?>" class="img-responsive"/>
                  <div class="w-feat"><?php echo $rowInvest['investment_name']; ?></div>
               </li>
            <?php endforeach; ?>
            </ul>
            <div class="a-feat">
               <div class="inline-block" style="margin-right: 25px;">
                  <div class="i-high">Highlights</div>
               </div>
               <div class="inline-block">
                  <div class="i-more"><?php echo $this->lang->line('moreproject');?></div>
               </div>
            </div>
         </div>
         */ ?>
         <div class="cell">
            <?php /*
            <div class="a-feat text-right hidden-md hidden-sm hidden-xs">
               <a href="javascript:;" class="btn-click-view" data-caption-map="<?php echo $this->lang->line('viewlistmap');?>" data-caption-list="<?php echo $this->lang->line('viewlist');?>">
                  <div class="i-list"><?php echo $this->lang->line('viewlist');?></div>
               </a>
            </div>
            */?>
            <div class="wrap-list-location hidden-lg hidden-md">
               <?php
                  if($list_location){
                     foreach ($list_location as $key => $value) {
                        ?>
                           <div class="item-location">
                              <h6><?php echo $value['set_location_name'];?></h6>
                              <?php 
                                 if(!empty($value['set_location_highlights'])) {
                                    ?>
                                       <span class="iconHighlights"></span>
                                    <?php
                                 }
                              ?>
                              <?php 
                                 if(!empty($value['set_location_moreprojects'])) {
                                    ?>
                                       <span class="iconMoreProjects"></span>
                                    <?php 
                                 }
                              ?>
                              <span class="iconPhase"><img src="<?php echo base_url('images/our/'.$value['phase_image']);?>" alt="<?php echo $value['set_location_name'];?>"></span>
                              <span class="iconInvestment"><img src="<?php echo base_url('images/business/investment/'.$value['investment_image']);?>" alt="Investment"></span>
                           </div>
                        <?php 
                     }
                  }
               ?>
            </div>
            <div class="wrap-map hidden-sm hidden-xs">               
               <img src=" <?php echo base_url('images/our/map_idn.png');?>" class="img-responsive img-map" style="width:100%;"/>
                  <?php
                     if($list_location){
                        foreach ($list_location as $key => $value) {
                           $latlang = explode(',', $value['set_location_position']);
                           ?>
                              <div class="btnPoint" style="top:<?php echo $latlang[0];?>px;left:<?php echo $latlang[1];?>px">
                                 <?php
                                    if(!empty($value['set_location_highlights']) || !empty($value['set_location_moreprojects'])){
                                       ?>
                                          <div class="box-highlight" id="bx-<?php echo $key;?>" data-class="<?php echo $value['seo_url'];?>">
                                             <?php
                                                if(!empty($value['set_location_highlights'])){
                                                   ?>
                                                      <div class="item-highlight">
                                                      <div class="clearfix">
                                                   		 <a class="btn-tutup " href="javascript:;"></a></div>
                                                         <div class="title"><?php echo $value['set_location_description_highlights_title'];?></div>
                                                         <div class="description"><?php echo character_limiter($value['set_location_description_highlights'],150);?></div>
                                                         <div class="link-more-box">
                                                            <a href="javascript:;" class="btn-more-box">
                                                               Project Info
                                                            </a>
                                                         </div>
                                                      </div>
                                                   <?php
                                                }
                                             ?>
                                             <?php
                                                if(!empty($value['set_location_moreprojects'])){
                                                   ?>
                                                      <div class="item-highlight">
                                                         <div class="title"><?php echo $value['set_location_description_moreprojects_title'];?></div>
                                                         <div class="description"><?php echo $value['set_location_description_moreprojects'];?></div>
                                                         <div class="link-more-box">
                                                            <a href="javascript:;" class="btn-more-box">
                                                               Project Info
                                                            </a>
                                                         </div>
                                                      </div>
                                                   <?php
                                                }
                                             ?>
                                          </div>
                                       <?php
                                    }
                                 ?>
                                 <span class="titlePoint"><?php echo $value['set_location_name'];?></span>
                                 <span class="iconPhase"><img src="<?php echo base_url('images/our/'.$value['phase_image']);?>" alt="<?php echo $value['set_location_name'];?>"></span>
                                 <span class="iconInvestment"><img src="<?php echo base_url('images/business/investment/'.$value['investment_image']);?>" alt="Investment"></span>
                                 <?php 
                                    if(!empty($value['set_location_highlights'])) {
                                       ?>
                                          <span class="iconHighlights"></span>
                                       <?php
                                    }
                                 ?>
                                 <?php 
                                    if(!empty($value['set_location_moreprojects'])) {
                                       ?>
                                          <span class="iconMoreProjects"></span>
                                       <?php 
                                    }
                                 ?>
                              </div>
                           <?php
                        }
                     }
                  ?>

            </div>
         </div>
      </div>
   </div>
</div>

<div class="content mb30">
 <?php if($ourbussines ): ?>
      <?php foreach ($ourbussines as $key => $item) :?>
      <?php if($key == 0):?>
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

      <div class="list-detail-loc">
         <div class="row">
            <?php if($list_location){ ?>
               <?php foreach ($list_location as $key => $value) { ?>
                  <div class="col-sm-12">
                     <div class="item-detail-loc <?php echo $value['seo_url'];?>">
                        <h5><?php echo $value['set_location_name'];?></h5>
                        <div class="desc-loc">
                           <h6><?php echo $value['set_location_description_highlights_title'];?></h6>
                           <div>
                              <p>
                                 <?php echo nl2br($value['set_location_description_highlights']);?>
                              </p>
                           </div>
                        </div>
                     </div>      
                  </div>
               <?php } ?>
            <?php } ?>
         </div>
      </div>

      </div>
       <?php endif ; ?>
    <?php endforeach ; ?>
    <?php endif ; ?>

   <div class="contentBusinessUnitDetail">
      <div class="detailHistory detailHistory-slider">
      <!-- loop gambar -->
      <?php foreach($slide as $slide): ?>
         <div class="item">
            <div class="tbl">
               <div class="cell l-timeline">
                  <div class="t-his"><?php echo $slide['business_name']; ?></div>
                  <div class="w-his">
            
                        <?php echo $slide['business_content']; ?>
           
                  </div>
               </div>
               <div class="cell">
                  <img src=" <?php echo base_url('images/business/'.$slide['business_image']);?>" class="img-responsive"/>
               </div>
            </div>
         </div>
      <?php endforeach; ?>
      <!-- end loop -->

    </div>
      <div class="listYear">
         <ul>
            <!-- loop tahun -->
            <?php foreach($slider as $x): ?>
               <li>
                  <a href="javascript:;"><?php echo $x['business_name']; ?></a>
               </li>
            <?php endforeach; ?>
            <!-- end loop tahun -->
         </ul>
      </div>
      <div class="arrowSlider">
           <div class="prevArrow"></div>
      </div>
      <div class="arrowSlider">
           <div class="nextArrow"></div>
      </div>


   </div>
   <!--
   <div class="arrow-active">
      <img src=" <?php //echo base_url('images/icons/arrow-timeline.png');?>" class="img-responsive"/>
   </div>
   -->
</div>


<script>
$('.btn-click-view').on('click', function(){
   if(!$(this).hasClass('is-list')){
      $(this).addClass('is-list');
      $(this).find('div').text($(this).attr('data-caption-map'));
      $('.wrap-list-location').addClass('show');
      $('.wrap-map').removeClass('show').addClass('hide');
   }else{
      $(this).find('div').text($(this).attr('data-caption-list'));
      $(this).removeClass('is-list');
      $('.wrap-list-location').removeClass('show').addClass('hide');
      $('.wrap-map').removeClass('hide').addClass('show');
   }
});


// function tutup(el){
//    var el = el || '';
//    var parent = el.parents('.box-highlight.show');
//    parent.removeClass('.show');
// }

$(function() {

   $('.btnPoint').each(function(){
      $(this).click(function(){
         var slider = $(this).find('.box-highlight').attr('id');
         if(!$(this).find('.box-highlight').hasClass('show')){
            $('.btnPoint').find('.box-highlight').removeClass('show');
            $(this).find('.box-highlight').addClass('show');

            $('#'+slider).slick({
               arrows: false,
               dots: true,

            });
         } else {
             $('.btnPoint').find('.box-highlight').removeClass('show');
         }
      })
   });

   $('.btn-more-box').on('click', function(){
      var attr = $(this).parents('.box-highlight').attr('data-class');
      $('html, body').animate({
         scrollTop: $('.'+attr).offset().top - parseInt(80)
      }, 1000);
   });

   $("ul.main-menu li a.nav-our").addClass("current");
   $('.listYear ul').slick({
      dots: false,
      arrows:false,
       hideByClick: false,
      focusOnSelect: true,
      infinite: true,
      slidesToShow: 7,
      slidesToScroll: 1,
      // centerMode: true,
      asNavFor: '.detailHistory-slider',
      responsive: [
         {
         breakpoint: 992,
            settings: {
            slidesToShow: 5,
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
      responsive: [
         {
         breakpoint: 768,
            settings: {
            adaptiveHeight: true,
            hideByClick: false
            }
         }
      ],
      asNavFor: '.listYear ul',
      prevArrow: $(".arrowSlider:first"),
      nextArrow: $(".arrowSlider:last")
   });

});
      $(document).ready(function(){
          $("p").click(function(){
              $(this).hide("slow");
          });
      });
</script>
<style>
   .show{
      display: block !important;
   }
</style>