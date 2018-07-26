<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post" enctype="multipart/form-data">
	    <?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>
        
        <div id="form-content">
        	<div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    <p>
                        <label for="language_name">Name</label>
                        <input type="text" class="input-text required" name="language_name" id="language_name" maxlength="100" />
                    </p>
                    <p>
                        <label for="language_code">Code</label>
                        <input type="text" class="input-text required" name="language_code" id="language_code" maxlength="2" />
                        <span class="help">Kode untuk url (maksimal 2 huruf)</span>
                    </p>
                    <p class="upload">
                        <label for="language_icon">Icon / Flag</label>
                        <input type="text" class="input-text" />
                        <input type="file" class="input-file" name="language_icon" accept="jpg|jpeg|gif|png" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->icon_width, 'px * ', $this->icon_height, 'px'; ?></span>
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