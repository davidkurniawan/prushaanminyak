
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
               <li><a href="<?php echo site_url('publications');?>" class="active"><?php echo $this->lang->line('Publications');?></a></li>
               <li><a href="<?php echo site_url('video');?>">Video</a></li>
            </ul>
         </div>
         <div class="col-sm-9">
            <div class="box-search">
               <div class="top-search">
                  <div class="i-search"><?php echo $this->lang->line('search');?> File</div>
               </div>
               <div class="bottom-search">
                  <form method="POST" action="">
                     <div class="row">
                        <div class="col-sm-6 col-md-5">
                           <div class="form-group">
                              <label><?php echo $this->lang->line('keyword');?></label>
                              <input
                              <?php if($this->input->post('keyword')){
                                 echo 'value ="'.$this->input->post('keyword').'"';
                                 } ?>

                              class="form-control" type="text" name="keyword" placeholder="Enter File Title Or Keyword"/>
                           </div>
                        </div>
                        <div class="col-sm-3 col-md-4">
                           <div class="form-group">
                              <label><?php echo $this->lang->line('year');?></label>
                              <div class="custom-select">
                                 <div class="i-select"><img src="<?php echo base_url('images/icons/arrow-search.png');?>" class="img-responsive"/></div>
                                 <select class="custom-select" name="year">
                                    <option value=""><?php echo $this->lang->line('all');?></option>
                                    <?php foreach($list_year as $ly):
                                       $date = date_create($ly['publications_start']);
                                       $year = date_format($date,'Y');
                                    ?>
                                       <option
                                       <?php if($this->input->post('year') == $year){
                                          echo "selected = 'selected'";
                                          } ?>
                                       value="<?php echo date_format($date,'Y'); ?>"><?php echo $year; ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <button class="btn btn-search btn-public" type="submit">
                              <div class="inline-block">
                                 <img src="<?php echo base_url('images/icons/search.png');?>" style="position: relative; top: -1px; right: 5px;">
                              </div>
                              <div class="inline-block"><?php echo $this->lang->line('search');?></div>
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="bdr-search"></div>

            <?php
               $cat = $this->db->query('SELECT * from publications_category where flag=1 and language_id='.current_language().' ORDER BY unique_id asc')->result_array();
               // $cat = $this->db->order_by('unique_id','asc')->get_where('publications_category', array('language_id'=>current_language(), 'flag'=>1))->result_array();
               // pre($cat);
               foreach($cat as $row):
                  foreach ($list_publications as $key => $value)
                  {
                     if($value['publications_category'] == $row['unique_id'])
                     {
                        ?>
                           <div class="t-job green"><?php echo $row['publications_category_name']; ?></div>
                        <?php
                        break;
                     }
                  }
            ?>
            <?php ?>
            <div class="box-public">
               <div class="row">
               <!-- loop -->

               <?php foreach($list_publications as $item):

                // $check_row = $this->db->get_where('publications_category',array('unique_id =' =>$item['publications_category']))->num_rows();

                if($row['unique_id'] == $item['publications_category'] )
                {
                   $date = date_create($item['publications_start']);
               ?>
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <div class="h140">
                              <img src="<?php echo ($item['publications_image'])? base_url('images/publications/'.$item['publications_image']) : base_url('images/defaultdoc.jpg');?>" class="img-responsive"/>
                           </div>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day"><?php echo date_format($date,'d'); ?></div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date"><?php echo date_format($date,'M'); ?><br/><?php echo date_format($date,'Y'); ?></div>
                              </div>
                           </div>
                           <p><?php echo character_limiter(strip_tags($item['publications_name']), 80); ?></p>
                           <a href="<?php echo base_url('upload/files/publication/'.$item['publications_doc']) ?>" download><div class="i-download"><?php echo $this->lang->line('download');?></div></a>
                        </div>
                     </div>
                  </div>
               <?php } endforeach;?>
               <!-- end loop -->
               </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</div>

<script>
$(function() {
   $("ul.main-menu li a.nav-news").addClass("current");
});
</script>
