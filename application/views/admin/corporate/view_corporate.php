<div id="content">
    	<form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" enctype="multipart/form-data">
    
        <input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['corporate_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php					
					$form = '';
					$x = 0;
					
					foreach (language()->result_array() as $lang) :
						
						$show = ($x == 0) ? 'style="display:block"' : '';
						$form .= '<div class="language lang-' . $lang['language_code'] . '" ' . $show . '>';
						$form .= '<p>';
						$form .= '<label for="corporate_name_' . $lang['language_id'] . '">Title</label>';
						
						$form .= '<input type="text" class="input-text required" name="corporate_name_' . $lang['language_id'] .'" id="corporate_name_' . $lang['language_id'] . '" value="' . $row[$lang['language_id']]['corporate_name'] . '" />';
						$form .= '</p>';
						
						$form .= '</div>';
						
						$x++;
					
					endforeach;
					
					echo $form;
					?>
                    
                    
                    <p class="upload">
                        <?php if ($row[$lang['language_id']]['corporate_image']) : ?>
                        <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="corporate_image" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load corporate_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        
                        <label>Image</label>
                        
                        <?php if ($row[$first]['corporate_image']) echo '<a class="hover-image" href="', base_url() , 'images/corporate/' , $row[$first]['corporate_image'] , '">&nbsp;</a>';
                        else echo '<span class="hover-image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['corporate_image']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="corporate_image" accept="jpg|jpeg|gif|png" size="36" />
                        
                        <input type="button" class="input-button" value="Browse" />
                        <?php if($row[$first]['flag_memo'] == 'CorporateValues'): ?>
                            <span class="help">Recommended Resolution: <?php echo $this->corporate_width, 'px * ', $this->corporate_height, 'px'; ?></span>
                        <?php else: ?>
                        	<?php if($row[$first]['flag_memo'] == ''): ?>
                            <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                    </p>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/view_flag'); ?> 
            </div>
            
            <div class="clear"></div>
            
            <?php
			$form = '';
			$x = 0;
			foreach (language()->result_array() as $lang) :
			
				$show = ($x == 0) ? 'style="display:block"' : '';
				$form .= '<div class="language lang-' . $lang['language_code'] . '" ' . $show . '>';
				$form .= '<div class="form-div ckeditor">';
				$form .= '<h3>Content</h3>';
				$form .= '<textarea class="content" name="corporate_content_' . $lang['language_id'] . '">' . $row[$lang['language_id']]['corporate_content'] . '</textarea>';
				$form .= '</div>';
				$form .= '</div>';
				
				$x++;
		
			endforeach;
			
			echo $form;
			?>
        </div>
    </form>
</div>