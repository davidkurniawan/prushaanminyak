<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post">
    
    	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>
    
    	<div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="testimonial_name_<?=$lang['language_id']?>">Name</label>
                                <input type="text" class="input-text required" name="testimonial_name_<?=$lang['language_id']?>" id="testimonial_name_<?=$lang['language_id']?>"></textarea>
                            </p>
                        </div>
                    <?php $x++; endforeach; ?>
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
                        <textarea class="content" name="testimonial_content_<?=$lang['language_id']?>"></textarea>
                     </div>
                 </div>
             <?php $x++; endforeach; ?>
         </div>
    </form>
</div>