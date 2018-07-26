<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post">
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['faq_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                    
                    <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                    <p>
                        <label for="faq_name_<?=$lang['language_id']?>">Question</label>
                        <input type="text" class="input-text required" name="faq_name_<?=$lang['language_id']?>" id="faq_name_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['faq_name']; ?>" />
                    </p>
                    </div>
                    
                    <?php $x++; endforeach; ?>
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/view_flag'); ?> 
            </div>
            
            <div class="clear"></div>
            
            <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                    
				<div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                    <div class="form-div ckeditor">
                        <h3>Answer</h3>
                        <textarea class="content" name="faq_content_<?=$lang['language_id']?>"><?php echo $row[$lang['language_id']]['faq_content']; ?></textarea>
                    </div>
                </div>
            <?php $x++; endforeach; ?>
        </div>
    </form>
</div>