<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" <?php if ($this->awards_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['awards_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="awards_name_<?=$lang['language_id']?>">Title</label>
                                <input type="text" class="input-text required" name="awards_name_<?=$lang['language_id']?>" id="awards_name_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['awards_name']; ?>" />
                        </p>
                        </div>
                    <?php $x++; endforeach; ?>
                    
                    <?php if ($this->awards_image == TRUE) : ?>
                    <p class="upload">
                        <?php if ($row[$first]['awards_image']) : ?>
                        <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="awards_image" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load awards_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        <label>Image</label>
                        
                        <?php if ($row[$first]['awards_image']) echo '<a class="hover-image" href="', base_url() , 'images/awards/' , $row[$first]['awards_image'] , '">&nbsp;</a>';
                        else echo '<span class="hover-image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['awards_image']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="awards_image" accept="jpg|jpeg|gif|png" size="36" />
                        
	                    <?php endif; ?>
                        
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                    </p>
                    
                    <p class="start-date">
                    	<label for="awards_start">Start Date</label>
                        <input type="text" id="awards_start" class="input-text datepicker required" name="awards_start" value="<?php echo date('Y-m-d', strtotime($row[$first]['awards_start'])); ?>" />
                    </p>
                    
                    <p class="end-date" <?php if ($row[$first]['awards_type'] == 2) echo 'style="display:block;"'; ?>>
                    	<label for="awards_end">End Date</label>
                        <input type="text" id="awards_end" class="input-text datepicker" name="awards_end" value="<?php echo date('Y-m-d', strtotime($row[$first]['awards_end'])); ?>" />
                    </p>
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/view_flag'); ?> 
            </div>
            
            <div class="clear"></div>
            
            <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
				<div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                    <div class="form-div ckeditor">
                        <h3>Content</h3>
                        <textarea class="content" name="awards_content_<?=$lang['language_id']?>"><?php echo $row[$lang['language_id']]['awards_content']; ?></textarea>
                    </div>
                </div>
            <?php $x++; endforeach; ?>
        </div>
    </form>
</div>