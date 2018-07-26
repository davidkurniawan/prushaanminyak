<div id="content">
        <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" <?php if ($this->publications_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    
        <input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['publications_name'])); ?>
        
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
                        
                        $form .= '<input type="text" class="input-text required" name="publications_name_' . $lang['language_id'] .'" id="publications_name_' . $lang['language_id'] . '" value="' . $row[$lang['language_id']]['publications_name'] . '" />';
                        $form .= '</p>';
        
                        $form .= '</div>';
                        
                        $x++;
                    
                    endforeach;
                    
                    echo $form;
                    ?>

                    <p class="select">
                    <!-- filter select berdasarkan bahasa -->
                    <?php $p_category = $this->db->get_where('publications_category',array('flag'=>1,'language_id' => 1))->result_array(); ?>
                    <!-- end filter -->
                    <label for="publications_category">Category</label>
                    <select required name="publications_category" class="input-text required" id="publications_category">
                        <option value="">--Select Category--</option>
                        <!-- extract select -->
                        <?php foreach($p_category as $row_category): ?>
                          <option  
                            <?php if($row[$first]['publications_category'] == $row_category['unique_id']) {
                            echo "selected";
                            } ?> 

                            value="<?php echo $row_category['unique_id'];?>"><?php echo $row_category['publications_category_name']; ?></option>
                        <?php endforeach; ?>
                        <!-- end extract -->
                     </select>
                   </p>
                    
                    <?php if ($this->publications_image == TRUE) : ?>
                    <p class="upload">
                        <?php if ($row[$lang['language_id']]['publications_image']) : ?>
                        <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="publications_image" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load publications_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        <label>Image</label>
                        
                        <?php if ($row[$first]['publications_image']) echo '<a class="hover-image" href="', base_url() , 'images/publications/' , $row[$first]['publications_image'] , '">&nbsp;</a>';
                        else echo '<span class="hover-publications_image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['publications_image']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="publications_image" accept="jpg|jpeg|gif|png" size="36" />
                        
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->thumb_width, 'px * ', $this->thumb_height, 'px'; ?></span>
                    </p>
                    <?php endif; ?>

                    
                    <?php 
                    if ($this->publications_doc == TRUE) : 
                    $x = 0; foreach (language()->result_array() as $lang) : ?>
                    
                    <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                        <p class="upload">
                            <?php if ($row[$lang['language_id']]['publications_doc']) : ?>
                            <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="publications_doc" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                            
                            <img class="load publications_doc" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                            
                            <?php endif; ?>
                            
                            <?php if ($row[$lang['language_id']]['publications_doc']) echo '<a class="hover-image" href="', base_url() , 'images/publications/' , $row[$lang['language_id']]['publications_doc'] , '">&nbsp;</a>';
                            else echo '<span class="hover-publications_doc">&nbsp;</span>'; ?>
                            
                            <label>Document</label>

                            <input type="text" class="input-text current-image" <?php if ($row[$lang['language_id']]['publications_doc']) echo 'value=""'; ?> />
                            
                            <input type="file" class="input-file" name="publications_doc_<?php echo $lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['publications_doc'] ?>" accept="doc|pdf|png|docx|jpg|xlsx|rtf" size="36" />
                            
                            <input type="button" class="input-button" value="Browse" />
                            <a target ="_blank" href="<?php echo base_url() , 'upload/files/publication/' , $row[$lang['language_id']]['publications_doc']?>"><div class="i-download" style="    display: block; color: #0099FF; font-size: 11px; margin-left: 115px; width: 308px; margin-top: 1px;">Lihat Document yang sudah di upload</div></a>
                        </p>
                    </div>
                       
                    <?php  $x++; endforeach; endif; ?>
                     <p class="start-date">
                        <label for="publications_start">Start Date</label>
                        <input type="text" id="publications_start" class="input-text datepicker required" name="publications_start" value="<?php echo date('Y-m-d', strtotime($row[$first]['publications_start'])); ?>" />
                    </p> 

                    <?php /*if ($this->publications_doc == TRUE) : ?>
                    <p class="upload">
                        <?php if ($row[$lang['language_id']]['publications_doc']) : ?>
                        <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="publications_doc" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load publications_doc" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        <label>Document</label>
                        
                        <?php if ($row[$first]['publications_doc']) echo '<a class="hover-image" href="', base_url() , 'images/publications/' , $row[$first]['publications_doc'] , '">&nbsp;</a>';
                        else echo '<span class="hover-publications_doc">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['publications_doc']) echo 'value=""'; ?> />
                        
                        <input type="file" class="input-file" name="publications_doc" accept="doc|pdf|png|docx|jpg|xlsx|rtf"/>
                        
                        <input type="button" class="input-button" value="Browse" />
                        <a target ="_blank" href="<?php echo base_url() , 'upload/files/publication/' , $row[$first]['publications_doc']?>"><div class="i-download" style="    display: block; color: #0099FF; font-size: 11px; margin-left: 115px; width: 308px; margin-top: 1px;">Lihat Document yang sudah di upload</div></a>
                    </p>

                    <p class="start-date">
                        <label for="publications_start">Start Date</label>
                        <input type="text" id="publications_start" class="input-text datepicker required" name="publications_start" value="<?php echo date('Y-m-d', strtotime($row[$first]['publications_start'])); ?>" />
                    </p>
                    <?php endif; */?>

                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/view_flag'); ?> 
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
                $form .= '<textarea class="content" name="publications_content_' . $lang['language_id'] . '">' . $row[$lang['language_id']]['publications_content'] . '</textarea>';
                $form .= '</div>';
                $form .= '</div>';
                
                $x++;
        
            endforeach;
            
            echo $form;
            */?>
        </div>
    </form>
</div>