<style type="text/css">
.input-custom{
      width: 100%;
      border: 1px solid #a6cf39;
      padding: 9px 9px 9px 9px;
      background: white;
      background-image: none;
      height: 35px;
      background-image: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
}
.custom-input {
    width: 100%;
    position: relative;
    color: #000000;

    border:none;
    font-size: 12px;
    -webkit-appearance: none;

}
</style>
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

<div class="content tbl-job">
   <div class="container">
      <div class="row">
         <div class="col-sm-3 col-md-2 xs20">
            <ul class="t-menu">
               <li><a href="<?php echo site_url('working');?>"><?php echo $this->lang->line('working');?></a></li>
               <li><a href="<?php echo site_url('job-vacancy');?>" class="active"><?php echo $this->lang->line('job');?></a></li>
            </ul>
         </div>

         <div class="col-sm-9">
            <?php /*
            <div class="box-search">
               <div class="top-search">
                  <div class="i-search"><?php echo $this->lang->line('searchjob');?></div>
               </div>

               <div class="bottom-search">
                  <form action="" method="post">
                     <div class="row">

                        <div class="col-sm-4">
                           <div class="form-group">
      								<label><?php echo $this->lang->line('jobfunction');?></label>
      								<div class="custom-select">
                                 <div class="i-select"><img src="<?php echo base_url('images/icons/arrow-search.png');?>" class="img-responsive"/></div>
      									<select class="custom-select" name="job_function">
      										<option value=""><?php echo $this->lang->line('all');?></option>
      										<?php foreach($job_function_list as $jf): ?>
                                       <option
                                       <?php if($this->input->post('job_function') == $jf['unique_id']) {
                                          echo "selected = 'selected'";
                                       } ?>
                                        value="<?php echo $jf['unique_id']; ?>"><?php echo $jf['job_function_name']; ?>
                                       </option>
                                    <?php endforeach; ?>
      									</select>
      								</div>
      							</div>
                        </div>

                        <div class="col-sm-4">
                           <div class="form-group">
                              <label><?php echo $this->lang->line('keyword');?></label>
                                 <div class="input-custom">
                                    <input type="text" class="custom-input" value="<?php if($this->input->post('free_search'))
                                    { 
                                       echo $this->input->post('free_search');
                                    }
                                    else
                                    {
                                       echo "";
                                    }  
                                    ?>" name="free_search">
                                 </div>
                           </div>
                        </div> */ ?>
                        <?php  /*
                        <div class="col-sm-4">
                           <div class="form-group">
      								<label><?php echo $this->lang->line('countrycity');?></label>
      								<div class="custom-select">
      									<div class="i-select"><img src="<?php echo base_url('images/icons/arrow-search.png');?>" class="img-responsive"/></div>
      									<select class="custom-select" name="country">
      										<option value=""><?php echo $this->lang->line('all');?></option>
                                    <?php foreach($country_list as $c): ?>
                                       <option
                                       <?php if($this->input->post('country') == $c['unique_id']) {
                                          echo "selected = 'selected'";
                                       } ?>
                                       value="<?php echo $c['unique_id']; ?>"><?php echo $c['country_name']; ?></option>
                                    <?php endforeach; ?>
      									</select>
      								</div>
      							</div>
                        </div>

                        <div class="col-sm-4">
                           <div class="form-group">
      								<label><?php echo $this->lang->line('worklocation');?></label>
                              <div class="h35">
                                 <div class="tbl">
                                    <div class="cell">
                                    <?php foreach($work_location_list as $wl):
                                    ?>
                                       <div class="inline-block mr15">
                                          <input
                                          <?php if($this->input->post('work_location'))
                                          {
                                             $x = $this->input->post('work_location');
                                             foreach ($x as $val) {
                                                if($val == $wl['unique_id']){
                                                   echo "checked";
                                                }
                                             }
                                          }
                                          ?>
                                          value="<?php echo $wl['unique_id']; ?>" type="checkbox" name="  work_location[]" id="<?php echo $wl['work_location_name']; ?>"  />

                                          <label for="<?php echo $wl['work_location_name']; ?>"><?php echo $wl['work_location_name']; ?></label>
                                       </div>
                                    <?php endforeach; ?>
                                    </div>
                                 </div>
                              </div>
      							</div>
                        </div>
                        */ ?>

                     <?php /*
                     </div>
                     <div class="row">
                        <div class="col-sm-8">
                           <div class="form-group">
      								<label><?php echo $this->lang->line('employment_type');?></label>
                              <div>
                              <?php foreach($employment_type_list as $key => $ep): ?>
                                 <div class="inline-block mr15 mdbm10">
                                    <input name="employment_type[]"
                                    <?php if($this->input->post('employment_type'))
                                       {
                                          $z = $this->input->post('employment_type');
                                          foreach ($z as $value) {
                                             if($value == $ep['unique_id']){
                                                echo "checked";
                                             }
                                          }
                                       }
                                    ?>
                                     value="<?php echo $ep['unique_id'];?>" type="checkbox" id="<?php echo $ep['employment_type_name'];?>" />
                                    <label for="<?php echo $ep['employment_type_name'];?>"><?php echo $ep['employment_type_name'];?></label>
                                 </div>
                              <?php endforeach; ?>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <button class="btn btn-search" name="search_job" type="submit">
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
            */?>


            <!-- <div class="bdr-search"></div> -->
               <div class="title2">
                  <p>Coming soon<p>
               </div>



            <!-- pesan sukses -->
            <?php if($this->session->flashdata('success')): ?>
               <div style="margin-bottom: 10px;" class="notif-success">
                  <center><?php echo $this->lang->line('success_apply'); ?><center>
               </div>
            <?php endif;?>
            <!-- end pesan sukses -->
            <!-- pesan error / gagal -->
            <?php if($this->session->flashdata('failure')): ?>
               <div style="margin-bottom: 10px;" class="notif-success">
                  <?php $this->session->flashdata('failure'); ?>
               </div>
            <?php endif;?>
            <!-- end pesan error / gagal -->

            <!-- <div class='t-job'>Job Opportunity (s)</div> -->
            <?php if($check_row > 0 ) :
               //echo "<div class='t-job'>Job Opportunity (s)</div>";
            else:
               //echo "<div class='t-job'>No Job Vacancy (s)</div>";
            endif;
            ?>
            <?php /*
               foreach($list_vacancy as $item):
               $country = $this->db->get_where('country',array('flag'=>1,'unique_id'=> $item['career_country']))->row_array();
               $jf = $this->db->get_where('job_function',array('flag'=>1,'unique_id'=> $item['career_job_function']))->row_array();
               $cn = $this->db->get_where('job_function',array('flag'=>1,'unique_id'=> $item['career_job_function']))->row_array();

            ?>
            <div class="box-job tbl">
               <div class="cell">
                  <a class="fancybox btn-apply" href="#pop-apply" style="display: block;" data-career-name ='<?php echo $cn['job_function_name']; ?>' data-unique='<?php echo $item['career_job_function']; ?>'>
                     <div class="n-job"><?php echo $jf['job_function_name'].', '.$item['career_name'] ?></div>
                     <div class="c-job"><?php echo $country['country_name'];?></div>
                     <p><?php echo $item['career_content']; ?></p>
                  </a>
               </div>
               <div class="cell w190">
                  <a class="fancybox" href="#pop-apply" style="display: block;">
                     <button class="btn btn-apply" type="button" data-career-name ='<?php echo $cn['job_function_name']; ?>' data-unique='<?php echo $item['career_job_function']; ?>'><?php echo $this->lang->line('applynow');?></button>
                  </a>
               </div>
            </div>
            <?php endforeach; */?>
         </div>
      </div>
   </div>
</div>
<div id="pop-apply" class="width-pop">
	<div class="t-job"><?php echo $this->lang->line('submitcv');?></div>
   <div class="t-job" id="career_name"></div>

   <form action="<?php echo base_url(); ?>job_vacancy/apply_job" enctype="multipart/form-data" method="POST" id="popForm" novalidate="novalidate">
      <input type="hidden" name="unique_career" id="unique_career">
      <input type="hidden" name="vacancy_name" id="vacancy_name">

      <div class="form-group">
         <input class="form-control required" type="text" minlength="3" id="name" name="name" placeholder="Full Name"/>
      </div>
      <div class="form-group">
         <input class="form-control email required" name="email" id="email" type="text" placeholder="Email"/>
      </div>
      <div class="form-group">
         <input class="form-control required number" name="phone" id="phone" minlength="11" type="text" placeholder="Phone"/>
      </div>
      <div class="form-group error-file">
         <label class="myLabel">
            <input type="file" accept="doc|pdf|docx" class="required custom-error" name="upload" id="upload"/>
            <div class="clearfix">
               <div class="pull-left">
                  <div class="t-file">Upload CV</div>
               </div>
               <div class="pull-right">
                  <div class="a-file"><?php echo $this->lang->line('attachfile');?></div>
               </div>
            </div>
         </label>
         <p style="margin-top:2px; font-size: 0.6em;">Accepted file : PDF/DOC/DOCX | Max Size 8 Mb</p>

      </div>
      <div class="form-group form-recaptcha" style="margin-bottom: 0;">
         <div class="clearfix">
            <div class="g-recaptcha" data-sitekey="6LePsiIUAAAAAFWREQBnbPENrZW7DPile3PwS47q" data-callback="recaptchaCallback" data-expired-callback="recaptchaExpired"></div>
            <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">

         </div>
         <button type="submit" name="apply_job" class="btn btn-submit" style="text-transform: none; margin-top: 20px;">Submit</button>
      </div>
   </form>
</div>

<script src='https://www.google.com/recaptcha/api.js'></script>

<script>
$(function() {
   $("ul.main-menu li a.nav-career").addClass("current");

   $('.btn.btn-submit').on('click',function(){
      if ($('input.custom-error').hasClass('valid')){
         $('.form-group.form-recaptcha').css('margin-top','0px');
      } else {
         $('.form-group.form-recaptcha').css('margin-top','40px');
      }
      if ($('input').hasClass('valid')){
         $('input.custom-error').parent().css({"background": "white", "border-color": "#d7d7d7"});
      } else {
         $('input.custom-error').parent().css({"background": "#fff7f7", "border-color": "#9e0b0f"});
      }

   });

   $('.fancybox').fancybox();

	$( document ).on( 'keydown', function ( e ) {
		if ( e.keyCode === 27 ) {
			$.fancybox.close();
		}
	});

   $('.btn-apply').on('click',function(){
      var id = $(this).attr('data-unique');
      var name = $(this).attr('data-career-name');
      $('#career_name').text(name);
      $('#vacancy_name').text(name);
      $('#unique_career').val(id);
   })

	$('.close-fancy').click(function(e) {
		$.fancybox.close();
	});
   $("#popForm").validate();

});

    function recaptchaCallback() {
      $('#hiddenRecaptcha').val(grecaptcha.getResponse());
      $('#hiddenRecaptcha').valid();
    };

    function recaptchaExpired(){
      $('#hiddenRecaptcha').val('');
    }
</script>
