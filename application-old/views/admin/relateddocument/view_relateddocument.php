<div id="content">
        <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" <?php if ($this->relateddocument_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    
        <input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['relateddocument_name'])); ?>
        
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
                        
                        $form .= '<input type="text" class="input-text required" name="relateddocument_name_' . $lang['language_id'] .'" id="relateddocument_name_' . $lang['language_id'] . '" value="' . $row[$lang['language_id']]['relateddocument_name'] . '" />';
                        $form .= '</p>';
        
                        $form .= '</div>';
                        
                        $x++;
                    
                    endforeach;
                    
                    echo $form;
                    ?>
                    
                    
                    <?php if ($this->relateddocument_image == TRUE) : ?>
                    <p class="upload">
                        <?php if ($row[$lang['language_id']]['relateddocument_image']) : ?>
                        
                        <img class="load relateddocument_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        
                        <label>Image</label>
                        
                        <?php if ($row[$first]['relateddocument_image']) echo '<a class="hover-image" href="', base_url() , 'images/relateddocument/' , $row[$first]['relateddocument_image'] , '">&nbsp;</a>';
                        else echo '<span class="hover-relateddocument_image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['relateddocument_image']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="relateddocument_image" accept="jpg|jpeg|gif|png" size="36" />
                        
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                    </p>
                    <?php endif; ?>



               
                      <?php if ($this->relateddocument_doc == TRUE) : ?>
                    <p class="upload">
                        <?php if ($row[$lang['language_id']]['relateddocument_doc']) : ?>

                        
                        <img class="load relateddocument_doc" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        <label>Document</label>
                        
                        <?php if ($row[$first]['relateddocument_doc']) echo '<a class="hover-image" href="', base_url() , 'images/relateddocument/' , $row[$first]['relateddocument_doc'] , '">&nbsp;</a>';
                        else echo '<span class="hover-relateddocument_doc">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['relateddocument_doc']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="relateddocument_doc" accept="doc|pdf|txt|docx|xls|xlsx|rtf" size="36" />
                        
                        <input type="button" class="input-button" value="Browse" />
                        <a target="_blank" href="<?php echo base_url() , 'images/relateddocument/' , $row[$first]['relateddocument_doc']?>">
                            <div class="i-download" style="    display: block; color: #0099FF; font-size: 11px; margin-left: 115px; width: 308px; margin-top: 5px;">Lihat Document yang sudah di upload
                            </div>
                        </a>
                    </p>

                    <p class="start-date">
                        <label for="relateddocument_start">Start Date</label>
                        <input type="text" id="relateddocument_start" class="input-text datepicker required" name="relateddocument_start" value="<?php echo date('Y-m-d', strtotime($row[$first]['relateddocument_start'])); ?>" />
                    </p>
                    
                    <p class="end-date" >
                        <label for="relateddocument_end">End Date</label>
                        <input type="text" id="relateddocument_end" class="input-text datepicker" name="relateddocument_end" value="<?php echo date('Y-m-d', strtotime($row[$first]['relateddocument_end'])); ?>" />
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
                $form .= '<textarea class="content" name="relateddocument_content_' . $lang['language_id'] . '">' . $row[$lang['language_id']]['relateddocument_content'] . '</textarea>';
                $form .= '</div>';
                $form .= '</div>';
                
                $x++;
        
            endforeach;
            
            echo $form;
            ?>
        </div>
    </form>
</div>