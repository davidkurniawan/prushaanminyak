<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post">
    
	    <?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>
        
        <div id="form-content">
        	<div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    <p>
                        <label for="section_name">Name</label>
                        <input type="text" class="input-text required" name="section_name" id="section_name" maxlength="100" />
                    </p>
                </div>
            </div>
        	
            <div id="form-right">
				<?php $this->load->view('admin/template/add_flag'); ?>
            </div>
            
            <div class="clear"></div>
        </div>
    </form>
</div>