<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post">
    
    	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>
    
    	<div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    <p>
                        <label for="admin_name">Name</label>
                        <input type="text" class="input-text required" name="admin_name" id="admin_name" maxlength="255" />
                    </p>
                    <p>
                        <label for="admin_username">Username</label>
                        <input type="text" class="input-text required" name="admin_username" id="admin_username" maxlength="100" remote="<?php echo base_url() . 'goadmin/admin/check_username'; ?>" />
                        <span class="help">Username untuk login (tidak dapat diubah)</span>
                    </p>
                    <?php
                    /*
                    <p>
                        <label for="admin_email">Email</label>
                        <input type="text" class="input-text required email" name="admin_email" id="admin_email" maxlength="100" />
                    </p>
                    */?>
                    <p>
                        <label for="admin_mobile">Mobile</label>
                        <input type="text" class="input-text" name="admin_mobile" id="admin_mobile" maxlength="100" />
                    </p>
                    <p>
                        <label for="admin_password">Password</label>
                        <input type="password" class="input-text required" name="admin_password" id="admin_password" maxlength="100" />
                        <span class="help">Password untuk login</span>
                    </p>
                    <p>
                        <label for="admin_re_password">Re-enter Password</label>
                        <input type="password" class="input-text required" id="admin_re_password" name="admin_re_password" maxlength="100" equalTo="#admin_password" />
                        <span class="help">Ketik ulang password untuk login</span>
                    </p>
                </div>
                
                <?php $this->load->view('admin/template/add_flag'); ?>
            </div>
            
            <div id="form-right">
                <div class="form-div">
                    <h3>Access Privilege</h3>
                    <div id="privilege">
                        <div class="option">
                            <input id="super_admin" class="privilege" name="admin_privilege" type="radio" value="1" checked="checked" />
                            <label for="super_admin">Super Admin</label>
                            <div class="clear"></div>
                        </div>
                        <?php
                        /*
                        <div class="option">
                            <input id="data_entry" class="privilege" name="admin_privilege" type="radio" value="2" />
                            <label for="data_entry">Data Entry</label>
                            <div class="clear"></div>
                        </div>*/
                        ?>
                        <div class="option last">
                            <input id="custom_privilege" class="privilege" name="admin_privilege" type="radio" value="3"  />
                            <label for="custom_privilege">Custom</label>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="access-table" style="display:none;">
                        <table class="tablesorter">
                            <thead align="center">
                                <tr>
                                    <th width="52%">Module</th>
                                    <th width="12%">Read</th>
                                    <th width="12%">Add</th>
                                    <th width="12%">Modify</th>
                                    <th width="12%">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $html = '';
                                $x=0;
                                foreach ($parent_modules->result_array() as $parent) :
                                
                                    $html .= '<tr class="module-parent" id="' . $parent['module_alias'] . '">';
                                    $html .= '<td colspan="5" align="center">' . $parent['module_name'] . '</td>';
                                    $html .= '</tr>';
                                    
                                    // Get child modules.
                                    $child_modules = $this->db->get_where('module', array('module_parent' => $parent['module_id'], 'flag' => 1));
                                    if ($child_modules->num_rows() > 0) :
                                        foreach ($child_modules->result_array() as $child) :
                                            $html .= '<tr class="child-' . $parent['module_alias'] . ' child-module" align="center">';
                                            $html .= '<td>' . $child['module_name'] . '</td>';
                                            $html .= '<td><input type="checkbox" value="8" class="access-read" name="' . $child['module_alias'] . '" /></td>';
                                            $html .= '<td><input type="checkbox" value="1" class="access-add" name="' . $child['module_alias'] . '" /></td>';
                                            $html .= '<td><input type="checkbox" value="2" class="access-modify" name="' . $child['module_alias'] . '" /></td>';
                                            $html .= '<td><input type="checkbox" value="4" class="access-delete" name="' . $child['module_alias'] . '" /></td>';
                                            $html .= '<td style="display:none;"><input id="total-' . $child['module_alias'] . '" type="hidden" name="' . $child['module_id'] . '" class="access_total" value="0" /></td>';
                                            $html .= '</tr>';
                                            $x++;
                                        endforeach;
                                    endif;
                                    
                                endforeach;
                                echo 'num'.$x;
                                echo $html;
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="clear"></div>
        </div>
    </form>
</div>