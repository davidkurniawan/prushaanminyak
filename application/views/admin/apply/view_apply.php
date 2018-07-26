<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row['unique_id']; ?>" method="post" >
        <input type="hidden" name="id" id="apply-id" value="<?php echo $row['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row['apply_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Aplicant Information</h3>   
                    <p>
                        <label for="apply_name>">Name</label>
                        <input type="text" disabled="disabled" class="input-text required"   value="<?php echo $row['apply_name']; ?>" />
                    </p>

                    <?php $job_name = $this->db->get_where('job_function',array('unique_id' =>$row['apply_job_function']))->row_array(); ?>
                    <p>
                        <label for="apply_name>">Position</label>
                        <input disabled="disabled" type="text" class="input-text required"   value="<?php echo $job_name['job_function_name']; ?>" />
                    </p>

                    <p>
                        <label for="apply_name>">Phone</label>
                        <input disabled="disabled" type="text" class="input-text required"   value="<?php echo $row['apply_phone']; ?>" />
                    </p>


                    <p>
                        <label for="apply_name>">Email</label>
                        <input disabled="disabled" type="text" class="input-text required"   value="<?php echo $row['apply_email']; ?>" />
                    </p>

                    <p>
                        <label for="apply_name>">Date</label>
                        <input disabled="disabled" type="text" class="input-text required"   value="<?php echo $row['apply_date']; ?>" />
                    </p>

                    <p>
                        <label for="apply_name>">Resume</label>
                        <p><a target="_blank" href="<?php echo base_url('upload/files/job_apply/'.$row['apply_cv']); ?>">Download Resume</a></p>
                    </p>

                </div>
            </div>
            
            <?php /* 
            <div id="form-right">
                <div class="form-div" id="status">
                    <h3>Status</h3>
                    <div id="flag">
                        <div class="option">
                            <input id="flag-1" type="radio" value="1" <?php if ($row['flag'] == 1) echo 'checked="checked"'; ?> name="flag" />
                            <label for="flag-1"><span style="background:#090"></span>Active</label>
                            <div class="clear"></div>
                        </div>
                        <div class="option">
                            <input id="flag-2" type="radio" value="2" <?php if ($row['flag'] == 2) echo 'checked="checked"'; ?> name="flag" />
                            <label for="flag-2"><span style="background:#F00;"></span>Inactive</label>
                            <div class="clear"></div>
                        </div>
                        <?php if (check_access($this->url, 'delete')) : ?>
                        <div class="option">
                            <input id="flag-3" type="radio" value="3" <?php if ($row['flag'] == 3) echo 'checked="checked"'; ?> name="flag" />
                            <label for="flag-3"><span style="background:#000;"></span>Delete</label>
                            <div class="clear"></div>
                        </div>
                        <?php endif; ?>
                        </div>
                        
                    <div id="flagmemo">
                        <p>
                            <label for="flag_memo">Memo</label>
                            <textarea class="input-text" id="flag_memo" name="flag_memo"><?php echo $row['flag_memo']; ?></textarea>
                        </p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            */?>
            <div class="clear"></div>
            
        </div>
    </form>
</div>