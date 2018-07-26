<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post">	

		<?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>
        
        <div id="form-content">
        	<div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    <p>
                        <label for="module_name">Name</label>
                        <input type="text" class="input-text required" name="module_name" id="module_name" maxlength="100" />
                    </p>
                    <p class="select">
                        <label for="module_parent">Parent</label>
                        <select id="module_parent" name="module_parent" class="input-text required">
                            <option value=""> --- </option>
                            <option value="0">(Parent Module)</option>
                            <?php foreach ($modules->result_array() as $item)
                            echo '<option value="' , $item['module_id'] , '">' , $item['module_name'] , '</option>'; ?>
                        </select>
                    </p>
                    <p>
                        <label for="module_url">URL</label>
                        <input type="text" class="input-text" name="module_url" id="module_url" maxlength="100" />	
                        <span class="help">Module URL (sama dengan nama controller)</span>
                    </p>
                    <p>
                        <label for="module_notes">Notes</label>
                        <textarea class="input-text" name="module_notes" id="module_notes"></textarea>	
                        <span class="help">Module Notes (internal use only)</span>
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