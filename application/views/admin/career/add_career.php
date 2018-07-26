<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post">

      <?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>

      <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>

                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="career_name_<?=$lang['language_id']?>">Title</label>
                                <input type="text" class="input-text required" name="career_name_<?=$lang['language_id']?>" id="career_name_<?=$lang['language_id']?>" />
                            </p>
                        </div>
                    <?php $x++; endforeach; ?>
                             <p class="select">
                                <!-- filter select berdasarkan bahasa -->
                                <?php $job_function = $this->db->get_where('job_function',array('flag'=>1,'language_id' => 1))->result_array(); ?>
                                <!-- end filter -->
                                <label for="job_function">Job Function</label>
                                <select name="job_function" class="input-text required" id="job_function">
                                    <option value="">--Select Job Function--</option>
                                    <!-- extract select -->
                                    <?php foreach($job_function as $row_job): ?>
                                    <option value="<?php echo $row_job['unique_id'];?>"><?php echo $row_job['job_function_name']; ?></option>
                                    <?php endforeach; ?>
                                    <!-- end extract -->
                                 </select>
                             </p>

                              <p class="select">
                                <!-- filter select berdasarkan bahasa -->
                                <?php $employment_type = $this->db->get_where('employment_type',array('flag'=>1,'language_id' => 1))->result_array(); ?>
                                <!-- end filter -->
                                <label for="employment_type">Employment Type</label>
                                <select name="employment_type" class="input-text" id="employment_type">
                                    <option value="">--Select Employment Type--</option>
                                    <!-- extract select -->
                                    <?php foreach($employment_type as $row_employment): ?>
                                      <option value="<?php echo $row_employment['unique_id'];?>"><?php echo $row_employment['employment_type_name']; ?></option>
                                    <?php endforeach; ?>
                                    <!-- end extract -->
                                 </select>
                               </p>

                                <p class="select">
                                  <label for="work_location">Work Location</label>
                                  <select name="work_location" class="input-text" id="work_location">
                                   <!-- filter select berdasarkan bahasa -->
                                   <?php $work_location = $this->db->get_where('work_location',array('flag'=>1,'language_id' => 1))->result_array(); ?>
                                   <!-- enf filter -->
                                      <option value="">--Select Work Location--</option>
                                    <!-- extract select -->
                                      <?php foreach($work_location as $row_work_location): ?>
                                        <option value="<?php echo $row_work_location['unique_id'];?>"><?php echo $row_work_location['work_location_name']; ?></option>
                                      <?php endforeach; ?>
                                    <!-- end extract -->
                                   </select>
                                 </p>

                                <?php /*
                                <p class="select">
                                  <label for="career_country">Country</label>
                                  <select name="career_country" class="input-text required" id="career_country">
                                    <?php $country = $this->db->get_where('country',array('flag'=>1))->result_array(); ?>
                                      <option value="">--Select Country--</option>
                                      <?php foreach($country as $row_country): ?>
                                      <option value="<?php echo $row_country['unique_id']; ?>"><?php echo $row_country['country_name']; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                </p>
                                */?>
                </div>
            </div>

            <div id="form-right">
                <?php $this->load->view('admin/template/add_flag'); ?>
            </div>

            <div class="clear"></div>

            <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                   <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                    <div class="form-div ckeditor">
                        <h3>Content</h3>
                        <textarea class="content" name="career_content_<?=$lang['language_id']?>"></textarea>
                     </div>
                 </div>
             <?php $x++; endforeach; ?>
         </div>
    </form>
</div>
