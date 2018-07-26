<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post" <?php if ($this->investment_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>

    	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>

    	<div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>

                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="investment_name_<?=$lang['language_id']?>">Title</label>
                                <input type="text" class="input-text required" name="investment_name_<?=$lang['language_id']?>" id="investment_name_<?=$lang['language_id']?>" />
                            </p>
                        </div>
                    <?php $x++; endforeach; ?>

                    <?php if ($this->investment_image == TRUE) : ?>
                    <p class="upload">
                        <label for="investment_image">Image</label>
                        <input type="text" class="input-text" />
                        <input type="file" class="input-file" name="investment_image" accept="jpg|jpeg|gif|png" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                    </p>
                    <?php endif; ?>
                </div>
            </div>

            <div id="form-right">
                <?php $this->load->view('admin/template/add_flag'); ?>
            </div>

            <div class="clear"></div>

         </div>
    </form>
</div>
