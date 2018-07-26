<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post">
    
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
                        $form .= '<label for="publications_category_name_' . $lang['language_id'] . '">Name</label>';
                        $form .= '<input type="text" class="input-text required" name="publications_category_name_' . $lang['language_id'] .'" id="publications_category_name_' . $lang['language_id'] . '" />';
                        $form .= '</p>';
                        
                        $form .= '</div>';
                        
                        $x++;
                    
                    endforeach;
                    
                    echo $form;
                    ?>
                    <?php
                        // <p>
                        //     <label for="publications_category_name">Name</label>
                        //     <input type="text" class="input-text required" name="publications_category_name" id="publications_category_name" />
                        // </p>
                    ?>
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/add_flag'); ?>
            </div>
            
            <div class="clear"></div>
         </div>
    </form>
</div>