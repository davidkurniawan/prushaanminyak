<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post" <?php if ($this->relateddocument_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    
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
						$form .= '<label for="relateddocument_name_' . $lang['language_id'] . '">Title</label>';
						$form .= '<input type="text" class="input-text required" name="relateddocument_name_' . $lang['language_id'] .'" id="relateddocument_name_' . $lang['language_id'] . '" />';
						$form .= '</p>';
						
						$form .= '</div>';
						
						$x++;
					
					endforeach;
					
					echo $form;
					?>

                    <?php if ($this->relateddocument_image	 == TRUE) : ?>
                    <p class="upload">
                        <label for="relateddocument_image">Image</label>
                        <input type="text" class="input-text" />
                        <input required type="file" class="input-file" name="relateddocument_image" accept="jpg|jpeg|gif|png" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                    </p>
                    <?php endif;  ?>

                    
                     <?php if ($this->relateddocument_doc == TRUE) : ?>
                    <p class="upload">
                        <label for="relateddocument_doc">Document</label>
                        <input type="text" class="input-text" />
                        <input required type="file" class="input-file" name="relateddocument_doc" accept="doc|pdf|txt|docx|xls|xlsx|rtf" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">File accepted doc|pdf|txt|docx|xls|xlsx|rtf 8 MB</span>
                    </p>
                    <?php endif;  ?>
                     <p class="start-date">
                    	<label for="news_start">Start Date</label>
                        <input type="text" id="relateddocument_start" class="input-text datepicker required" name="relateddocument_start" />
                    </p>

                    <p class="end-date">
                    	<label for="news_end">End Date</label>
                        <input type="text" id="relateddocument_end" class="input-text datepicker" name="relateddocument_end" />
                    </p>
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
				$form .= '<textarea class="content" name="relateddocument_content_' . $lang['language_id'] . '"></textarea>';
				$form .= '</div>';
				$form .= '</div>';
				
				$x++;
		
			endforeach;
			
			echo $form;
			?>
         </div>
    </form>
</div>