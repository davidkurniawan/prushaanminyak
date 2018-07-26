<div id="content">
    	<form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" <?php if ($this->article_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    
        <input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['article_name'])); ?>
        
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
						$form .= '<label for="article_name_' . $lang['language_id'] . '">Title</label>';
						
						$form .= '<input type="text" class="input-text required" name="article_name_' . $lang['language_id'] .'" id="article_name_' . $lang['language_id'] . '" value="' . $row[$lang['language_id']]['article_name'] . '" />';
						$form .= '</p>';
						
						$form .= '<p>';
						$form .= '<label for="article_head_' . $lang['language_id'] . '">Heading</label>';
						$form .= '<input type="text" class="input-text required" name="article_head_' . $lang['language_id'] . '" id="article_head_' . $lang['language_id'] . '" value="' . $row[$lang['language_id']]['article_head'] . '" />';
						$form .= '<span class="help">Heading atau Intro Teks</span>';
						$form .= '</p>';
						$form .= '</div>';
						
						$x++;
					
					endforeach;
					
					echo $form;
					?>
                    
                    <?php if ($this->article_image == TRUE) : ?>
                    <p class="upload">
                        <?php if ($row[$lang['language_id']]['article_image']) : ?>
                        <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="article_image" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load article_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        <?php if($row[$first]['article_image'] != '' ): ?>
                        <label>Image</label>
                        
                        <?php if ($row[$first]['article_image']) echo '<a class="hover-image" href="', base_url() , 'images/article/' , $row[$first]['article_image'] , '">&nbsp;</a>';
                        else echo '<span class="hover-image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['article_image']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="article_image" accept="jpg|jpeg|gif|png" size="36" />
                        
                        <input type="button" class="input-button" value="Browse" />

						<?php if($row[$first]['flag_memo'] == 'Sshe'): ?>
                            <span class="help">Recommended Resolution: <?php echo $this->sshe_width, 'px * ', $this->sshe_height, 'px'; ?></span>
                            
                        <?php else: ?>
                        	<?php if($row[$first]['flag_memo'] == 'Corporate'): ?>
                            <span class="help">Recommended Resolution: <?php echo $this->corporate_width, 'px * ', $this->corporate_height, 'px'; ?></span>
                        <?php else: ?>
                            <?php if($row[$first]['flag_memo'] == 'Visimisi'): ?>
                            <span class="help">Recommended Resolution: <?php echo $this->visimisi_width, 'px * ', $this->visimisi_height, 'px'; ?></span>
                            <?php else: ?>
                            <?php if($row[$first]['flag_memo'] == 'Home'): ?>
                            <span class="help">Recommended Resolution: <?php echo $this->home_width, 'px * ', $this->home_height, 'px'; ?></span>
                        <?php else: ?>
                            <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                            <?php endif;?>
                            <?php endif;?>
                            <?php endif;?>
                            <?php endif;?>
                     

                        <?php endif; ?>
                    </p>
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
                if($row[$lang['language_id']]['flag_memo'] == 'Visimisi'):
                    $form .='<span class="helpeditor">Char max : '. $this->char_max .' </span>';
                $form .= '<textarea class="content" name="article_content_' . $lang['language_id'] . '">' . (limit_words($row[$lang['language_id']]['article_content'], 40)) . '</textarea>';
                endif;
				$form .= '<textarea class="content" name="article_content_' . $lang['language_id'] . '">' . $row[$lang['language_id']]['article_content'] . '</textarea>';
				$form .= '</div>';
				$form .= '</div>';
				
				$x++;
		
			endforeach;
			
			echo $form;
			?>
        </div>
    </form>
</div>
</div>
</div>