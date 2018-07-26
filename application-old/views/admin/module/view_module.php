<div id="content">
    <form action="<?php echo base_url(), 'goadmin/' , $url , '/view/' , $row[0]['unique_id']; ?>" method="post">
    	<input type="hidden" name="id" value="<?php echo $row[0]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[0]['module_name'])); ?>
        
        <div id="form-content">
        	<div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    <p>
                        <label for="module_name">Name</label>
                        <input type="text" class="input-text required" name="module_name" id="module_name" value="<?php echo $row[0]['module_name']?>" maxlength="100" />
                    </p>
                    <p class="select">
                        <label for="module_parent">Parent</label>
                        <select id="module_parent" name="module_parent" class="input-text required">
                            <option value=""> --- </option>
                            <option <?php if ($row[0]['module_parent'] == 0) echo 'selected="selected"'; ?> value="0">(Parent Module)</option>
                            <?php foreach ($modules->result_array() as $item)
                            {
                                $select = ($item['unique_id'] == $row[0]['module_parent']) ? 'selected="selected"' : '';
                                echo '<option ' , $select , 'value="' , $item['unique_id'] , '">' , $item['module_name'] , '</option>';
                            }?>
                        </select>
                    </p>
                    <p>
                        <label for="module_url">URL</label>
                        <input type="text" class="input-text" name="module_url" id="module_url" value="<?php echo $row[0]['module_url']; ?>" maxlength="100" />	
                        <span class="help">Module URL (sama dengan nama controller)</span>
                    </p>
                    <p>
                        <label for="module_notes">Notes</label>
                        <textarea class="input-text" name="module_notes" id="module_notes"><?php echo $row[0]['module_notes']; ?></textarea>	
                        <span class="help">Module Notes (internal use only)</span>
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