<div id="content">
    <form action="<?php echo base_url(), 'goadmin/' , $url , '/view/' , $row[0]['unique_id']; ?>" method="post" enctype="multipart/form-data">
    	<input type="hidden" id="item-id" name="id" value="<?php echo $row[0]['unique_id']; ?>" />
        
         <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[0]['language_name'])); ?>
         
		<div id="form-content">
        	<div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    <p>
                        <label for="language_name">Name</label>
                        <input type="text" class="input-text required" name="language_name" id="language_name" maxlength="100" value="<?php echo $row[0]['language_name']; ?>" />
                    </p>
                    <p>
                        <label for="language_code">Code</label>
                        <input type="text" class="input-text required" name="language_code" id="language_code" maxlength="2" value="<?php echo $row[0]['language_code']; ?>" />
                        <span class="help">Kode untuk url (maksimal 2 huruf)</span>
                    </p>
                    
					<p class="upload">
                        <?php if ($row[0]['language_icon']) : ?>
                        <img class="delete-image" title="Delete Image" alt="language" id="language_icon" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load language_icon" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        <label>Image</label>
                        
                        <?php if ($row[0]['language_icon']) echo '<a class="hover-image" href="', base_url() , 'images/language/' , $row[0]['language_icon'] , '">&nbsp;</a>';
                        else echo '<span class="hover-image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[0]['language_icon']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="language_icon" accept="jpg|jpeg|gif|png" size="36" />
                        
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->icon_width, 'px * ', $this->icon_height, 'px'; ?></span>
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