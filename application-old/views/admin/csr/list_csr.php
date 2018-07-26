<div id="content">
	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'list')); ?>
    <?php /* 
    <form class="filter" method="post" action="<?php echo current_url(); ?>">
    	<label for="csr_filter">Filter By Type :</label>
    	<select class="input-text" name="csr_filter" id="csr_filter">
        	<option value="">-- Select Type --</option>
            <option value="1" <?php if ($this->input->post('filter') == '1') echo 'selected="selected"'; ?>>csr</option>
            <option value="2" <?php if ($this->input->post('filter') == '2') echo 'selected="selected"'; ?>>Event</option>
            <option value="3" <?php if ($this->input->post('filter') == '3') echo 'selected="selected"'; ?>>Announcement</option>
        </select>
    </form>
    */?>
    <table class="tablesorter" id="<?php echo $url; ?>">
    	<thead>
        	<tr>
            	<th width="35">No.</th>
            	<th>Title</th>
                <th width="85">Type</th>
                <th width="150">Start</th>
                <!-- <th width="150">End</th> -->
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
			<td align="center">
                                        <?php echo $i; ?>   
                        </td>

	           <td>
                                        <?php echo $item['csr_name']; ?>
                        </td>
                        
                        <td>
                		<?php if ($item['csr_type'] == 1) echo 'CSR';
                		elseif ($item['csr_type'] == 2) echo 'Event';
                		elseif ($item['csr_type'] == 3) echo 'Announcement';
                		else echo '--'; ?>
                        </td>

                        <td>
                            <?php echo date('l, d F Y', strtotime($item['csr_start'])); ?>
                        </td>

                        <?php /*
                        <td>
		<?php if ($item['csr_type'] != 2) echo '--'; else echo date('l, d F Y', strtotime($item['csr_end'])); ?>
                        </td>
	           */?>

		              <td id="item-<?php echo $item['unique_id']; ?>" class="flag <?php echo $item['flag']; ?>">
                            <span style="background:<?php echo $color; ?>;"></span><img class="load" src="<?php echo base_url(), 'images/admin/ajax-loader.gif' ?>" />
                        </td>

						<td id="memo-<?php echo $item['unique_id']; ?>">
                            <?php echo $item['flag_memo']; ?>                  
                        </td>
						
                        <?php /*  
                        <td class="del">
                            <img id="row-<?php echo $item['unique_id']; ?>" src="<?php echo base_url(), 'images/admin/delete.gif'; ?>" />
                        </td>
                        */?>

                        <td class="del">
                        	<a title="Edit &quot;<?php echo $item['csr_name']; ?>&quot;" href="<?php echo base_url(), 'goadmin/', $url, '/view/', $item['unique_id']; ?>" class="input-submit edit">View</a>
                        </td>
                        <td style="text-align: center;">
                            <?php if (check_access($this->url, 'delete')) : ?>
                            <input class="deletechecked" type="checkbox" value="<?php echo $item['unique_id']; ?>" />
                            <?php endif; ?>
                        </td>
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
				<th>Type</th>
                <th>Start</th>
                <!-- <th>End</th> -->
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </tfoot>
    </table>
</div>
