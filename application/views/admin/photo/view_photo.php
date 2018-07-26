<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['photo_id']; ?>" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['photo_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['photo_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="photo_name_<?=$lang['language_id']?>">Name</label>
                                <input type="text" class="input-text required" name="photo_name_<?=$lang['language_id']?>" id="photo_name_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['photo_name']; ?>" />
                            </p>
                        </div>
                    <?php $x++; endforeach; ?>
                    
                    <p class="select">
                        <label for="photo_category">Category</label>
                        <select name="photo_category" id="photo_category" class="input-text">
                        	<option value="">-- Select Category --</option>
                            <?php foreach ($category->result_array() as $item) : ?>
                            <option value="<?php echo $item['unique_id']; ?>" <?php if ($row[$first]['photo_category'] == $item['unique_id']) echo 'selected="selected"'; ?>><?php echo $item['gallery_category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    
                    <p class="upload">
                        <?php if ($row[$first]['photo_image']) : ?>
                        <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="photo_image" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load photo_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        <label>Image</label>
                        
                        <?php if ($row[$first]['photo_image']) echo '<a class="hover-image" href="', base_url() , 'images/photo/' , $row[$first]['photo_image'] , '">&nbsp;</a>';
                        else echo '<span class="hover-image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['photo_image']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="photo_image" accept="jpg|jpeg|gif|png" size="36" />
                        
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
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