<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post" <?php if ($this->awards_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>

    	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>

    	<div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>

                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="awards_name_<?=$lang['language_id']?>">Title</label>
                                <input type="text" class="input-text required" name="awards_name_<?=$lang['language_id']?>" id="awards_name_<?=$lang['language_id']?>" />
                            </p>
                        </div>
                    <?php $x++; endforeach; ?>

                    <?php if ($this->awards_image == TRUE) : ?>
                    <p class="upload">
                        <label for="awards_image">Image</label>
                        <input type="text" class="input-text" />
                        <input type="file" class="input-file" name="awards_image" accept="jpg|jpeg|gif|png" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                    </p>
                    <?php endif; ?>

                    <p class="start-date">
                    	<label for="awards_start">Start Date</label>
                        <input type="text" id="awards_start" class="input-text datepicker required" name="awards_start" />
                    </p>

                    <p class="end-date">
                    	<label for="awards_end">End Date</label>
                        <input type="text" id="awards_end" class="input-text datepicker" name="awards_end" />
                    </p>
                </div>
            </div>

            <div id="form-right">
                <?php $this->load->view('admin/template/add_flag'); ?>
            </div>

            <div class="clear"></div>

            <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
				<div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                    <div class="form-div ckeditor">
                        <h3>Content</h3>
                        <textarea class="content" name="awards_content_<?=$lang['language_id']?>"></textarea>
                     </div>
                 </div>
             <?php $x++; endforeach; ?>
         </div>
    </form>
</div>
