<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post" <?php if ($this->article_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    
    	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>
    
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
						$form .= '<input type="text" class="input-text required" name="article_name_' . $lang['language_id'] .'" id="article_name_' . $lang['language_id'] . '" />';
						$form .= '</p>';
						
						$form .= '<p>';
						$form .= '<label for="article_head_' . $lang['language_id'] . '">Heading</label>';
						$form .= '<input type="text" class="input-text required" name="article_head_' . $lang['language_id'] . '" id="article_head_' . $lang['language_id'] . '" />';
						$form .= '<span class="help">Heading atau Intro Teks</span>';
						$form .= '</p>';
						$form .= '</div>';
						
						$x++;
					
					endforeach;
					
					echo $form;
					?>
                   
                    
                    <?php if ($this->article_image == TRUE) : ?>
                    <p class="upload">
                        <label for="article_image">Image</label>
                        <input type="text" class="input-text" />
                        <input type="file" class="input-file" name="article_image" accept="jpg|jpeg|gif|png" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help"> Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                    </p>
                    <?php endif;  ?>
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/add_flag'); ?>
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
				$form .= '<textarea class="content" name="article_content_' . $lang['language_id'] . '"></textarea>';
				$form .= '</div>';
				$form .= '</div>';
				
				$x++;
		
			endforeach;
			
			echo $form;
			?>
         </div>
    </form>
</div>