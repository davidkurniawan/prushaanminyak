<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" <?php if ($this->career_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['career_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="career_name_<?=$lang['language_id']?>">Title</label>
                                <input type="text" class="input-text required" name="career_name_<?=$lang['language_id']?>" id="career_name_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['career_name']; ?>" />
                        	</p>
                        </div>
                    <?php $x++; endforeach; ?>

                    <p class="select">
                      <label for="job_function">Job Function</label>
                      <select name="job_function" class="input-text required" id="job_function">
                       <!-- filter select berdasarkan bahasa -->
                       <?php 
                          $job_function = $this->db->get_where('job_function',array('flag'=>1,'language_id' => 1))->result_array(); 
                       ?>
                       <!-- end filter -->
                          <option value="">--Select Employment Type--</option>
                          <?php foreach($job_function as $jf): ?>
                            <option value="<?php echo $jf['unique_id'];?>" 
                            <?php if($row[$lang['language_id']]['career_job_function'] == $jf['unique_id']){
                              echo 'selected = "selected"';
                              } ?>
                            ><?php echo $jf['job_function_name']; ?></option>
                          <?php endforeach; ?>
                       </select>
                    </p>

                    <p class="select">
                        <label for="employment_type">Employment Type</label>
                        <select name="employment_type" class="input-text" id="employment_type">
                         <!-- filter select berdasarkan bahasa -->
                         <?php 
                            $employment_type = $this->db->get_where('employment_type',array('flag'=>1,'language_id' => 1))->result_array(); 
                         ?>
                         <!-- end filter -->
                            <option value="">--Select Employment Type--</option>
                            <?php foreach($employment_type as $et): ?>
                              <option value="<?php echo $et['unique_id'];?>" 
                              <?php if($row[$lang['language_id']]['career_employment_type'] == $et['unique_id']){
                                echo 'selected = "selected"';
                                } ?>
                              ><?php echo $et['employment_type_name']; ?></option>
                            <?php endforeach; ?>
                         </select>
                      </p>

                          <p class="select">
                              <label for="work_location">Work Location</label>
                              <select name="work_location" class="input-text" id="work_location">
                               <!-- filter select berdasarkan bahasa -->
                               <?php 
                                  $work_location = $this->db->get_where('work_location',array('flag'=>1,'language_id' => 1))->result_array(); 
                               ?>
                               <!-- end filter -->
                                  <option value="">--Select Work Location--</option>
                                  <?php foreach($work_location as $wl): ?>
                                    <option value="<?php echo $wl['unique_id'];?>" 
                                    <?php if($row[$lang['language_id']]['career_work_location'] == $wl['unique_id']){
                                      echo 'selected = "selected"';
                                      } ?>
                                    ><?php echo $wl['work_location_name']; ?></option>
                                  <?php endforeach; ?>
                               </select>
                            </p>
	                
                   <?php /*
                  <p class="select">
                      <label for="country">Country</label>
                      <select name="country" class="input-text required" id="country">
                        <?php $country = $this->db->get_where('country',array('flag'=>1))->result_array(); ?>
                          <option value="">--Select Country--</option>
                          <?php foreach($country as $rc): ?>
                          <option value="<?php echo $rc['unique_id']; ?>"
                        <?php if($row[$lang['language_id']]['career_country'] == $rc['unique_id']){
                            echo 'selected = "selected"';
                            } ?>
                          ><?php echo $rc['country_name']; ?></option>
                          <?php endforeach; ?>
                      </select>
                    </p>
                   */?>
                    
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/view_flag'); ?> 
            </div>
            
            <div class="clear"></div>
            
            <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
				<div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                    <div class="form-div ckeditor">
                        <h3>Description</h3>
                        <textarea class="content" name="career_content_<?=$lang['language_id']?>"><?php echo $row[$lang['language_id']]['career_content']; ?></textarea>
                    </div>
                </div>
            <?php $x++; endforeach; ?>
        </div>
    </form>
</div>