<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post" <?php if ($this->publications_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    
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
						$form .= '<label for="publications_name_' . $lang['language_id'] . '">Title</label>';
						$form .= '<input type="text" class="input-text required" name="publications_name_' . $lang['language_id'] .'" id="publications_name_' . $lang['language_id'] . '" />';
						$form .= '</p>';
						
						$form .= '</div>';
						
						$x++;
					
					endforeach;
					
					echo $form;
					?>

                    <?php 
                    $x = 0; foreach (language()->result_array() as $lang) : ?>
                    
                    <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                          <p class="select">
                            <!-- filter select berdasarkan bahasa -->
                            <?php $p_category = $this->db->get_where('publications_category',array('flag'=>1,'language_id' => $lang['language_id']))->result_array(); ?>
                            <!-- end filter -->
                            <label for="publications_category">Category</label>
                            <select required name="publications_category_<?php echo $lang['language_id']?>" class="input-text required" onchange="changecat(<?php echo $lang['language_id'];?>)" id="publications_category_<?php echo $lang['language_id']?>">
                                <option value="">--Select Category--</option>
                                <!-- extract select -->
                                <?php foreach($p_category as $row_category): ?>
                                  <option value="<?php echo $row_category['unique_id'];?>"><?php echo $row_category['publications_category_name']; ?></option>
                                <?php endforeach; ?>
                                <!-- end extract -->
                             </select>
                           </p>
                    </div>
                    <?php  $x++; endforeach; ?>

                    <?php if ($this->publications_image	 == TRUE) : ?>
                    <p class="upload">
                        <label for="publications_image">Image</label>
                        <input type="text" class="input-text" />
                        <input type="file" class="input-file" name="publications_image" accept="jpg|jpeg|gif|png" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">File accepted JPG, PNG and PDF Maximum Size: 8 MB </span>
                        <span class="help">Recommended Resolution: <?php echo $this->thumb_width, 'px * ', $this->thumb_height, 'px'; ?></span>
                        
                    </p>
                    <?php endif;  ?>


                    <?php
                    if ($this->publications_doc == TRUE) :
                        $form = '';
                        $x = 0;
                        foreach (language()->result_array() as $lang) :
                        
                            $show = ($x == 0) ? 'style="display:block"' : '';
                            $form .= '<div class="language lang-' . $lang['language_code'] . '" ' . $show . '>';
                            $form .= '<p class="upload">';
                            $form .= '<label for="publications_doc_' . $lang['language_id'] . '">Document</label>';
                            $form .= '<input type="text" class="input-text" />';
                            $form .= '<input type="file" class="input-file" name="publications_doc_' . $lang['language_id'] .'" id="publications_doc_' . $lang['language_id'] . '" accept="pdf|doc|docx|xlsx" size="36" required/>';
                            $form .= '<input type="button" class="input-button" value="Browse" />';
                            $form .= '<span class="help">File accepted Docs, pdf|docx|doc|xlsx 8 MB</span>';
                            $form .= '</p>';
                            
                            $form .= '</div>';
                            
                            $x++;
                        
                        endforeach;
                        
                        echo $form;
                    endif;
                    ?>
                    
                    
                     <?php /*if ($this->publications_doc == TRUE) : 
                    <p class="upload">
                        <label for="publications_doc">Document</label>
                        <input type="text" class="input-text" />
                        <input required type="file" class="input-file" name="publications_doc" accept="pdf|doc|docx|xlsx" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">File accepted Docs, pdf|docx|doc|xlsx 8 MB</span>

                    </p>
                    endif; */ ?>
                     <p class="start-date">
                    	<label for="news_start">Start Date</label>
                        <input type="text" id="publications_start" class="input-text datepicker required" name="publications_start" />
                    </p>

                    <p class="end-date">
                    	<label for="news_end">End Date</label>
                        <input type="text" id="publications_end" class="input-text datepicker" name="publications_end" />
                    </p>
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/add_flag'); ?>
            </div>
            
            <div class="clear"></div>
            
            <?php
			/*$form = '';
			$x = 0;
			foreach (language()->result_array() as $lang) :
			
				$show = ($x == 0) ? 'style="display:block"' : '';
				$form .= '<div class="language lang-' . $lang['language_code'] . '" ' . $show . '>';
				$form .= '<div class="form-div ckeditor">';
				$form .= '<h3>Content</h3>';
				$form .= '<textarea class="content" name="publications_content_' . $lang['language_id'] . '"></textarea>';
				$form .= '</div>';
				$form .= '</div>';
				
				$x++;
		
			endforeach;
			
			echo $form;
			*/?>
         </div>
    </form>
</div>

<script type="text/javascript">
    function changecat(lang) {
        var opt = $('#publications_category_'+lang+' option:selected').val();
        if(lang==1){
            $('#publications_category_2').val(opt);
        }else{
            $('#publications_category_1').val(opt);
        }   
    }
</script>