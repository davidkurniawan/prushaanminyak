<div id="content">
    <form action="<?php echo base_url(), 'goadmin/' , $url , '/view/' , $row[0]['unique_id']; ?>" method="post">
	<input type="hidden" id="item-id" name="id" value="<?php echo $row[0]['unique_id']; ?>" />
        
		<?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[0]['admin_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    <p>
                        <label for="admin_name">Name</label>
                        <input type="text" class="input-text required" name="admin_name" id="admin_name" value="<?php echo $row[0]['admin_name']; ?>"   autocomplete="off"/>
                    </p>
                    <p>
                        <label for="admin_username">Username</label>
                        <input type="text" class="input-text readonly" name="" id="admin_username" value="<?php echo $row[0]['admin_username']; ?>" readonly="readonly"  autocomplete="off" />
                    </p>
                    <?php /*
                    <p>
                        <label for="admin_email">Email</label>
                        <input type="text" class="input-text required email" name="admin_email" id="admin_email" value="<?php echo $row[0]['admin_email']; ?>" />
                    </p>
                    */?>
                    <p>
                        <label for="admin_mobile">Mobile</label>
                        <input type="text" class="input-text" name="admin_mobile" id="admin_mobile" value="<?php echo $row[0]['admin_mobile']; ?>" />
                    </p>
                </div>
                <div class="form-div">
                    <h3>Password</h3>
                    <?php if($this->session->userdata['admin_privilege'] != 1 ) {?>
                    <p>
                        <label for="old_password">Old Password</label>
                        <input type="password" class="input-text" name="old_password" id="old_password" maxlength="100" />
                        <span class="help">Password lama (diperlukan jika ingin mengganti password)</span>
                    </p>
                    <p>
                        <label for="admin_password">Password</label>
                        <input type="password" class="input-text" name="admin_password" id="admin_password" maxlength="100"  />
                        <span class="help">Password baru</span>
                    </p>
                    <p>
                        <label for="admin_re_password">Re-enter Password</label>
                        <input type="password" class="input-text" id="admin_re_password" name="admin_re_password" maxlength="100" equalTo="#admin_password" />
                        <span class="help">Ketil ulang password baru untuk login</span>
                    </p>
                    <?php } else {?>
                      <p>
                        <label for="admin_password">Password</label>
                        <input type="password" class="input-text " name="admin_password" id="admin_password" minlength="8" autocomplete="off" />
                         <span class="help" >Password baru</span>
                    </p>
                    <?php } ?>
                </div>
<?php if (check_access($this->url, 'view')) : ?>            
                <?php $this->load->view('admin/template/view_flag'); ?> 
<?php endif; ?>
            </div>

            <div id="form-right">
<?php if (check_access($this->url, 'view')) : ?>
                <div class="form-div">
                    <h3>Access Privilege</h3>
                    <div id="privilege">
                        <div class="option">
                            <input id="super_admin" class="privilege" name="admin_privilege" type="radio" value="1" <?php if ($row[0]['admin_privilege'] == 1) echo 'checked="checked"'; ?> />
                            <label for="super_admin">Super Admin</label>
                            <div class="clear"></div>
                        </div>
                        <?php /*
                        <div class="option">
                            <input id="data_entry" class="privilege" name="admin_privilege" type="radio" value="2" <?php if ($row[0]['admin_privilege'] == 2) echo 'checked="checked"'; ?> />
                            <label for="data_entry">Data Entry</label>
                            <div class="clear"></div>
                        </div>
                        */?>
                        <div class="option last">
                            <input id="custom_privilege" class="privilege" name="admin_privilege" type="radio" value="3" <?php if ($row[0]['admin_privilege'] == 3) echo 'checked="checked"'; ?> />
                            <label for="custom_privilege">Custom</label>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="access-table" <?php echo ($row[0]['admin_privilege'] == 3) ? 'style="display:block;"' : 'style="display:none;"'; ?>>
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
                                foreach ($parent_modules->result_array() as $parent) :
                                
                                    $html .= '<tr class="module-parent" id="' . $parent['module_alias'] . '">';
                                    $html .= '<td colspan="5" align="center">' . $parent['module_name'] . '</td>';
                                    $html .= '</tr>';
                                    
                                    // Get child modules.
                                    $child_modules = $this->db->get_where('module', array('module_parent' => $parent['module_id'], 'flag' => 1));
                                    
                                    if ($child_modules->num_rows() > 0) :
                                        foreach ($child_modules->result_array() as $child) :
                                        
                                            $module_list = explode(',', $row[0]['module_list']);
                                            $access = explode(',', $row[0]['access']);
                                            $array_key = array_search($child['module_id'], $module_list);
                                            
                                            $value = ($access[$array_key]) ? $access[$array_key] : 0;
                                            
                                            $add = (($access[$array_key] & 1) == 1) ? 'checked="checked"' : '';
                                            $edit = (($access[$array_key] & 2) == 2) ? 'checked="checked"' : '';
                                            $delete = (($access[$array_key] & 4) == 4) ? 'checked="checked"' : '';
                                            $read = (($access[$array_key] & 8) == 8) ? 'checked="checked"' : '';
                                        
                                        
                                            $html .= '<tr class="child-' . $parent['module_alias'] . ' child-module" align="center">';
                                            $html .= '<td>' . $child['module_name'] . '</td>';
                                            $html .= '<td><input ' . $read . ' type="checkbox" value="8" class="access-read" name="' . $child['module_alias'] . '" /></td>';
                                            $html .= '<td><input ' . $add . ' type="checkbox" value="1" class="access-add" name="' . $child['module_alias'] . '" /></td>';
                                            $html .= '<td><input ' . $edit . ' type="checkbox" value="2" class="access-modify" name="' . $child['module_alias'] . '" /></td>';
                                            $html .= '<td><input ' . $delete . ' type="checkbox" value="4" class="access-delete" name="' . $child['module_alias'] . '" /></td>';
                                            $html .= '<td style="display:none;"><input id="total-' . $child['module_alias'] . '" type="hidden" name="' . $child['module_id'] . '" class="access_total" value="' . $value . '" /></td>';
                                            $html .= '</tr>';
                                        endforeach;
                                    endif;
                                    
                                endforeach;
                                
                                echo $html;
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
      <?php endif; ?>
            </div>
 
        	<div class="clear"></div>
		</div>
    </form>

	<div class="form-div" style="width:1008px; margin-left:15px;">
    	<h3>Action Log</h3>
	<table id="pager" style="margin:0;">
        <tr>
            <td><img src="<?php echo base_url() , 'css/pager/first.png'; ?>" class="first"/></td>
            <td><img src="<?php echo base_url() , 'css/pager/prev.png'; ?>" class="prev"/></td>
            <td class="pagedisplay"></td>
            <td><img src="<?php echo base_url() , 'css/pager/next.png'; ?>" class="next"/></td>
            <td><img src="<?php echo base_url() , 'css/pager/last.png'; ?>" class="last"/></td>
            <td style="width:30px; padding-left:10px;">Display</td>
            <td class="choice">
                <select class="pagesize">
                    <option value="10">10</option>
                    <option selected="selected" value="25">25</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                </select>
            </td>
            <td width="35" align="center">data</td>
        </tr>
    </table>
    
    <div class="clear"></div>
                
    <table id="action-log" class="tablesorter">
    	<thead>
        	<tr>
            	<th>No.</th>
                <th>Action</th>
                <th>Date</th>
                <th>IP Address</th>
            </tr>
        </thead>
        <tbody>
        	<?php
			$i = 1;
			$html = '';
            foreach ($logs->result_array() as $item) :
			
				$html .= '<tr>';
				$html .= '<td>' . $i . '</td>';
				$html .= '<td>' . $item['log_desc'] . '</td>';
				$html .= '<td>' . date('l, d F Y H:i:s', strtotime($item['log_date'])) . '</td>';
				$html .= '<td>' . $item['log_ip'] . '</td>';
				$html .= '</tr>';
				
				$i++;
			endforeach;
			
			echo $html;
			?>
        </tbody>
        <tfoot>
        	<tr>
            	<th>No.</th>
                <th>Action</th>
                <th>Date</th>
                <th>IP Address</th>
            </tr>
        </tfoot>
    </table>
    </div>
</div>