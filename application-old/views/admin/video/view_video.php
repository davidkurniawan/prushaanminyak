<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['video_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="video_name_<?=$lang['language_id']?>">Name</label>
                                <input type="text" class="input-text required" name="video_name_<?=$lang['language_id']?>" id="video_name_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['video_name']; ?>" />
                            </p>
                        </div>
                    <?php $x++; endforeach; ?>
                    
                  <!--   <p class="select">
                        <label for="video_category">Category</label>
                        <select name="video_category" id="video_category" class="input-text">
                        	<option value="">-- Select Category --</option>
                            <option value="0" <?php if ($row[$first]['video_category'] == 0) echo 'selected="selected"'; ?>>(Parent Category)</option>
                            <?php foreach ($category->result_array() as $item) : ?>
                            <option value="<?php echo $item['unique_id']; ?>" <?php if ($row[$first]['video_category'] == $item['unique_id']) echo 'selected="selected"'; ?>><?php echo $item['gallery_category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p> -->
                    
                    <p>
                    	<label for="video_link">Youtube Link</label>
                        <input type="text" class="input-text required" name="video_link" id="video_link" value="<?php echo $row[$first]['video_link']; ?>" />
                        <span class="help">Jika full link http://www.youtube.com/watch?v=STPwAla5LBk<br />cukup tuliskan <strong>STPwAla5LBk</strong> saja</span>
                    </p>
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/view_flag'); ?> 
            </div>
            
            <div class="clear"></div>
            
			<div class="form-div ckeditor" style="text-align:center;">
                <h3>Video Preview</h3>
				<iframe width="450" height="300" style="border:3px solid #0099FF;" src="http://www.youtube.com/embed/<?php echo $row[$first]['video_link']; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </form>
</div>