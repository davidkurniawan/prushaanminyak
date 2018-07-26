<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['banner_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                    
                    <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                        <p>
                            <label for="banner_name_<?=$lang['language_id']?>">Name</label>
                            <input type="text" class="input-text required" name="banner_name_<?=$lang['language_id']?>" id="banner_name_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['banner_name']; ?>" />
                        </p>
                        <p>
                            <label for="banner_heading_<?=$lang['language_id']?>">Heading</label>
                            <input type="text" class="input-text" name="banner_heading_<?=$lang['language_id']?>" id="banner_heading_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['banner_heading']; ?>" />
                        </p>

                        <?php if($row[$lang['language_id']]['flag_memo'] != 'Menu Banner'): ?>
                        <p>
                            <label for="banner_caption_<?=$lang['language_id']?>">Caption</label>
                            <textarea maxlength="<?php echo $this->max_words; ?>" type="text" class="input-text" name="banner_caption_<?=$lang['language_id']?>" id="banner_caption_<?=$lang['language_id']?>" value=""><?php echo $row[$lang['language_id']]['banner_caption']; ?></textarea>
                            <span class="help">Limit Words <?php echo $this->max_words; ?></span>
                        </p>
                        <?php endif; ?>
                    </div>
                    
                    <?php $x++; endforeach; ?>
                    
                    <?php if($row[$first]['flag_memo'] != 'Menu Banner'): ?>
                    <p>
                        <label for="banner_link">Banners Link</label>
                        <input type="text" class="input-text banner_sort url" name="banner_link" id="banner_link" value="<?php echo $row[$first]['banner_link']; ?>"  />
                        <span class="help">Link that will go to detail article / news</span>
                    </p>
                    <?php endif; ?>
                   
                    <?php if($row[$first]['flag_memo'] != 'Menu Banner'): ?>
                    <p>
                        <label for="banner_sort">Sort Banners</label>
                        <input type="text" class="input-text banner_sort " name="banner_sort" id="banner_sort" value="<?php echo $row[$first]['banner_sort']; ?>"  />
                        <span class="help">Sort banner by number</span>
                    </p>
                    <?php endif; ?>
                    
                    <p class="upload">
                        <?php if ($row[$first]['banner_image']) : ?>
                        <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="banner_image" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load banner_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        <?php endif; ?>
                        <label>Image</label>
                        
                        <?php if ($row[$first]['banner_image']) echo '<a class="hover-image" href="', base_url() , 'images/banner/' , $row[$first]['banner_image'] , '">&nbsp;</a>';
                        else echo '<span class="hover-image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image " <?php if ($row[$first]['banner_image']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="banner_image" accept="jpg|jpeg|gif|png" size="36" />
                        
                        <input type="button" class="input-button" value="Browse" />
                        <?php if($row[$first]['flag_memo'] == 'Menu Banner'): ?>
                            <span class="help">Recommended Resolution: <?php echo $this->menu_banner_width, 'px * ', $this->menu_banner_height, 'px'; ?></span>
                        <?php else: ?>
                            <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>

                        <?php endif; ?>
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