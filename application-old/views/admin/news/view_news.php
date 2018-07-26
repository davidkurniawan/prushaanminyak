<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" <?php if ($this->news_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['news_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="news_name_<?=$lang['language_id']?>">Title</label>
                                <input type="text" class="input-text required" name="news_name_<?=$lang['language_id']?>" id="news_name_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['news_name']; ?>" />
                                <span class="help">Judul article</span>
                        </p>
                        </div>
                    <?php $x++; endforeach; ?>
                    
                    
                    <?php if ($this->news_image == TRUE) : ?>
                    <p class="upload">
                        <?php if ($row[$first]['news_image']) : ?>
                        <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="news_image" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load news_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        <label>Image</label>
                        
                        <?php if ($row[$first]['news_image']) echo '<a class="hover-image" href="', base_url() , 'images/news/' , $row[$first]['news_image'] , '">&nbsp;</a>';
                        else echo '<span class="hover-image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['news_image']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="news_image" accept="jpg|jpeg|gif|png" size="36" />
                        
	                    <?php endif; ?>
                        
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                    </p>

                    <p class="start-date">
                        <label for="news_start">Start Date</label>
                        <input type="text" id="news_start" class="input-text datepicker required" name="news_start" value="<?php echo date('Y-m-d', strtotime($row[$first]['news_start'])); ?>" />
                    </p>
                    
                    <p class="end-date" <?php if ($row[$first]['news_type'] == 2) echo 'style="display:block;"'; ?>>
                    	<label for="news_end">End Date</label>
                        <input type="text" id="news_end" class="input-text datepicker" name="news_end" value="<?php echo date('Y-m-d', strtotime($row[$first]['news_end'])); ?>" />
                    </p>
                </div>


                <div class="form-div">
                    <h3>News Image(s)</h3>
                    <?php
                        foreach ($imagesmultiple as $key => $img) {
                            ?>
                            <p class="upload multipleimage removemultipleimage<?php echo $img['news_multiple_id']; ?>">
                                <label for="news_image">
                                    <a id="removemultipleimage<?php echo $img['news_multiple_id']; ?>" data-table="news" class="input-submit delete_multiple_image btn-remove" href="javascript:;">X</a>
                                    <span>Image</span>
                                </label>
                                
                                <a class="hover-image" href="<?php echo base_url() . 'images/news/slide/' . $img['news_multiple_name']; ?>">&nbsp;</a>
                                <input type="text" class="input-text current-image" value="hover to view current image" />
                                <input type="hidden" name="current_multipleimage[]" class="current_image" value="<?php echo $img['news_multiple_name']; ?>" />
                                <img class="load news_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                                
                                <?php /*
                                <input type="file" class="input-file has_current_image" name="multipleimage[]" accept="jpg|jpeg|gif|png" size="36" />
                                <input type="hidden" value="<?php echo $key; ?>" name="multipleimage_sort[]" />
                                <input type="button" class="input-button" value="Browse" />
                                */?>
                            </p>
                            <?php
                        }
                    ?>
                    <a id="add_multipleimage" class="input-submit" href="javascript:;">Add Images</a>
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/view_flag'); ?> 
            </div>
            
            <div class="clear"></div>
            
            <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
				<div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                    <div class="form-div ckeditor">
                        <h3>Content</h3>
                        <textarea class="content" name="news_content_<?=$lang['language_id']?>"><?php echo $row[$lang['language_id']]['news_content']; ?></textarea>
                    </div>
                </div>
            <?php $x++; endforeach; ?>
        </div>
    </form>
</div>

<style type="text/css">
.multipleimage .btn-remove {
    float: left;
    font-weight: bold;
    line-height: 1.5;
    width: 20px !important;
}
</style>