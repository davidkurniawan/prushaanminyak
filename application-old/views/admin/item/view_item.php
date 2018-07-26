<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" <?php if ($this->item_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['item_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="item_name_<?=$lang['language_id']?>">Name</label>
                                <input type="text" class="input-text required" name="item_name_<?=$lang['language_id']?>" id="item_name_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['item_name']; ?>" />
                            </p>
                        </div>
                    <?php $x++; endforeach; ?>
                    
                    <p class="select">
                        <label for="item_category">Category</label>
                        <select name="item_category" id="item_category" class="input-text required">
                        	<option value="">-- Select Category --</option>
                            <?php foreach ($parent_category->result_array() as $item) : ?>
                            <option value="<?php echo $item['unique_id']; ?>" <?php if ($parent_selected == $item['unique_id']) echo 'selected="selected"'; ?>><?php echo $item['product_category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    
                    <?php if ($this->subcategory == TRUE) : ?>
                    <p class="select" id="choose-subcategory">
                    	<img class="load" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        <label for="item_subcategory">Subcategory</label>
                        <select name="item_subcategory" id="item_subcategory" class="input-text">
                        	<option value="">-- Select Subcategory --</option>
                            <?php foreach ($subcategory->result_array() as $item) : ?>
                            <option value="<?php echo $item['unique_id']; ?>" <?php if ($child_selected == $item['unique_id']) echo 'selected="selected"'; ?>><?php echo $item['product_category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <?php endif; ?>

                    <?php if ($this->item_image == TRUE) : ?>
                    <p class="upload">
                        <?php if ($row[$first]['item_image']) : ?>
                        <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="item_image" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load item_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        <label>Image</label>
                        
                        <?php if ($row[$first]['item_image']) echo '<a class="hover-image" href="', base_url() , 'images/product/' , $row[$first]['item_image'] , '">&nbsp;</a>';
                        else echo '<span class="hover-image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['item_image']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="item_image" accept="jpg|jpeg|gif|png" size="36" />
                        
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/view_flag'); ?> 
            </div>
            
            <div class="clear"></div>
            
            <?php if ($this->item_content == TRUE) : ?>
				<?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                    <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                        <div class="form-div ckeditor">
                            <h3>Content</h3>
                            <textarea class="content" name="item_content_<?=$lang['language_id']?>"><?php echo $row[$lang['language_id']]['item_content']; ?></textarea>
                        </div>
                    </div>
                <?php $x++; endforeach; ?>
            <?php endif; ?>
        </div>
    </form>
</div>