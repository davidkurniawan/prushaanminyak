<div id="content">
	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'list')); ?>
    
    <table class="tablesorter" id="<?php echo $url; ?>">
    	<thead>
        	<tr>
            	<th width="35">No.</th>
            	<th>Name</th>
                <th>Username</th>
                <?php //<th>Email</th>?>
                <th>Mobile</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </thead>
        <tbody>
        	<?php
            if ($query->result_array()) :
				$i = 1;
				foreach ($query->result_array() as $item) :
					if ($item['flag'] == 1) $color = '#090';
					elseif ($item['flag'] == 2) $color = '#F00'; ?>
					<tr>
						<td align="center"><?php echo $i; ?></td>
						<td><?php echo $item['admin_name']; ?></td>
                        <td><?php echo $item['admin_username']; ?></td>
                        <?php //<td><?php //echo $item['admin_email']; </td>?>
                        <td><?php echo $item['admin_mobile']; ?></td>
						<td id="item-<?php echo $item['unique_id']; ?>" class="<?php if (check_access($this->url, 'edit')) echo 'flag '; ?><?php echo $item['flag']; ?>"><span style="background:<?php echo $color; ?>;"></span><img class="load" src="<?php echo base_url(), 'images/admin/ajax-loader.gif' ?>" /></td>
						<td id="memo-<?php echo $item['unique_id']; ?>"><?php echo $item['flag_memo']; ?></td>
						<!--<td class="del"><img id="row-<?php echo $item['unique_id']; ?>" src="<?php echo base_url(), 'images/admin/delete.gif'; ?>" /></td>-->
                        <?php if (check_access($this->url, 'read') || check_access($this->url, 'delete')) : ?>
                        <td class="del">
                        	<?php if (check_access($this->url, 'read')) : ?>
                        	<a title="View &quot;<?php echo $item['admin_name']; ?>&quot;" href="<?php echo base_url(), 'goadmin/', $url, '/view/', $item['unique_id']; ?>" class="input-submit edit">View</a>
                            <?php endif; ?>
                        </td>                        
                        <td style="text-align: center;">
                            <?php if (check_access($this->url, 'delete')) : ?>                        
                            <input class="deletechecked" type="checkbox" value="<?php echo $item['unique_id']; ?>" />
                            <?php endif; ?>
                        </td>                                                
                        <?php endif; ?>
					</tr>
				<?php
                $i++;
				endforeach;
			else :
				echo '<tr><td colspan="100%" align="center">No Data</td></td>';
			endif;
			?>
        </tbody>
        <tfoot>
        	<tr>
            	<th>No.</th>
            	<th>Name</th>
                <th>Username</th>
                <?php //<th>Email</th>?>
                <th>Mobile</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </tfoot>
    </table>
</div>