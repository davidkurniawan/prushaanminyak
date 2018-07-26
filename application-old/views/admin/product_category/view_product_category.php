<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post">
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['product_category_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="product_category_name_<?=$lang['language_id']?>">Name</label>
                                <input type="text" class="input-text required" name="product_category_name_<?=$lang['language_id']?>" id="product_category_name_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['product_category_name']; ?>" />
                            </p>
                        </div>
                    <?php $x++; endforeach; ?>
                    
                    <p class="select">
                        <label for="product_category_parent">Parent</label>
                        <select name="product_category_parent" class="input-text required" id="product_category_parent">
                            <option value="">-- Select Parent Category --</option>
                            <option value="0" <?php if ($row[$first]['product_category_parent'] == 0) echo 'selected="selected"'; ?>>(Parent Category)</option>
                            <?php foreach ($parent_category->result_array() as $item) : ?>
                            <option value="<?php echo $item['unique_id']; ?>" <?php if ($item['product_category_id'] == $row[$first]['product_category_parent']) echo 'selected="selected"'; ?>><?php echo $item['product_category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help">Pemilihan parent category</span>
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