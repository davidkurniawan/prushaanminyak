<div id="content">
    <form action="<?php echo base_url(), 'goadmin/' , $url , '/view/' , $row[0]['section_id']; ?>" method="post">
    	<input type="hidden" name="id" value="<?php echo $row[0]['section_id']; ?>" />
        
		<?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[0]['section_name'])); ?>
        
        <div id="form-content">
        	<div id="form-left"> 
                <div class="form-div">
                    <h3>Information</h3>
                    <p>
                        <label for="section_name">Name</label>
                        <input type="text" class="input-text required" name="section_name" id="section_name" maxlength="100" value="<?php echo $row[0]['section_name']; ?>" />
                    </p>
                </div>
            </div>
            
            <div id="form-right">
				<?php $this->load->view('admin/template/view_flag'); ?>
			</div>
            
            <div class="clear"></div>
        </div>
        
    </form>
</div>