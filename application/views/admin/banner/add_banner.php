<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post" enctype="multipart/form-data">
    
    	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>
    
    	<div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                    <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                        <p>
                            <label for="banner_name_<?=$lang['language_id']?>">Name</label>
                            <input type="text" class="input-text required" name="banner_name_<?=$lang['language_id']?>" id="banner_name_<?=$lang['language_id']?>" />
                        </p>
                        <p>
                            <label for="banner_heading_<?=$lang['language_id']?>">Heading</label>
                            <input type="text" class="input-text" name="banner_heading_<?=$lang['language_id']?>" id="banner_heading_<?=$lang['language_id']?>" />
                        </p>

                        <p>
                            <label maxlength="250" for="banner_caption_<?=$lang['language_id']?>">Caption</label>
                            <textarea maxlength="<?php echo $this->max_words; ?>" type="text" class="input-text" name="banner_caption_<?=(limit_words($lang['language_id'],40))?>" id="banner_caption_<?=(limit_words($lang['language_id'],40))?>" /></textarea>
                            <span class="help">Limit Words <?php echo $this->max_words; ?></span>
                        </p>
                    </div>
                    <?php $x++; endforeach; ?>
                    <p>
                        <label for="banner_link">Banners Link</label>
                        <input type="text" class="input-text url" name="banner_link" id="banner_link" />
                        <span class="help">Link that will go to detail article / news</span>
                    </p>
                    <p>
                        <label for="sort_banner">Sort Banners</label>
                        <input type="text" class="input-text" name="banner_sort" id="banner_sort" />
                        <span class="help">Sort banner by number</span>
                    </p>
                    <p class="upload">
                        <label for="banner_image">Image</label>
                        <input type="text" class="input-text" />
                        <input type="file" class="input-file required" name="banner_image" accept="jpg|jpeg|gif|png" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
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