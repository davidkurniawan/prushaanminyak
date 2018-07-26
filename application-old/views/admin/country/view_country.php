<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row['unique_id']; ?>" method="post" >
        <input type="hidden" name="id" id="country-id" value="<?php echo $row['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row['country_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>   
                    <p>
                        <label for="country_name>">Country Name</label>
                        <input type="text" class="input-text required" name="country_name" id="country_name" value="<?php echo $row['country_name']; ?>" />
                    </p>
                </div>
            </div>
            
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
            
            <div class="clear"></div>
            
        </div>
    </form>
</div>