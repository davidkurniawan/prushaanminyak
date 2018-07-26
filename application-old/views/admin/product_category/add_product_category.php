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
                                <label for="product_category_name_<?=$lang['language_id']?>">Name</label>
                                <input type="text" class="input-text required" name="product_category_name_<?=$lang['language_id']?>" id="product_category_name_<?=$lang['language_id']?>" />
                            </p>
	                    </div>
                    <?php $x++; endforeach; ?>
                    
                    <p class="select">
                        <label for="product_category_parent">Parent</label>
                        <select name="product_category_parent" class="input-text required" id="product_category_parent">
                            <option value="">-- Select Parent Category --</option>
                            <option value="0">(Parent Category)</option>
                            <?php foreach ($parent_category->result_array() as $item) : ?>
                            <option value="<?php echo $item['unique_id']; ?>"><?php echo $item['product_category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help">Pemilihan parent category</span>
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